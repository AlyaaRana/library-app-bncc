<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\BorrowingDetail;
use App\Models\Book;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with('member')->latest()->paginate(10);
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $users = User::all();
        $books = Book::where('stock', '>', 0)->get();

        return view('borrowings.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'books' => 'required|array|min:1',
            'books.*.book_id' => 'required|exists:books,id',
            'books.*.quantity' => 'required|integer|min:1'
        ]);

        DB::beginTransaction();

        try {
            $borrowing = Borrowing::create([
                'member_id' => $request->member_id,
                'borrow_date' => now()->toDateString(),
                'status' => 'borrowed'
            ]);

            foreach ($request->books as $item) {
                $book = Book::findOrFail($item['book_id']);

                if ($book->stock < $item['quantity']) {
                    throw new \Exception("Stock buku {$book->title} tidak cukup");
                }

                $book->decrement('stock', $item['quantity']);

                BorrowingDetail::create([
                    'borrowing_id' => $borrowing->id,
                    'book_id' => $book->id,
                    'quantity' => $item['quantity']
                ]);
            }

            DB::commit();
            return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil dibuat.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(Borrowing $borrowing)
    {
        $borrowing->load('member', 'details.book');
        return view('borrowings.show', compact('borrowing'));
    }

    public function edit(Borrowing $borrowing)
    {
        if ($borrowing->status === 'returned') {
            return redirect()->back()->with('error', 'Peminjaman sudah dikembalikan.');
        }
        $borrowing->load('details.book');
        return view('borrowings.edit', compact('borrowing'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        if ($borrowing->status === 'returned') {
            return redirect()->back()->with('error', 'Peminjaman sudah dikembalikan.');
        }

        DB::beginTransaction();

        try {
            foreach ($borrowing->details as $detail) {
                $detail->book->increment('stock', $detail->quantity);
            }

            $borrowing->update([
                'status' => 'returned',
                'return_date' => now()->toDateString()
            ]);

            DB::commit();
            return redirect()->route('borrowings.index')->with('success', 'Buku berhasil dikembalikan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();
        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil dihapus.');
    }
}
