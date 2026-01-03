<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\BorrowingDetail;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $borrowings = Borrowing::with('member')->latest()->get();
        return response()->json($borrowings);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $members = Member::all();
        $books = Book::all();

        return response()->json([
            'members' => $members,
            'books' => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DB::beginTransaction();

        try {
            // buat borrowing
            $borrowing = Borrowing::create([
                'member_id' => $request->member_id,
                'borrow_date' => now(),
                'status' => 'borrowed'
            ]);

            foreach ($request->books as $item) {
                $book = Book::findOrFail($item['book_id']);

                // cek stock
                if ($book->stock < $item['quantity']) {
                    throw new \Exception("Stock buku {$book->title} tidak cukup");
                }

                // kurangi stock
                $book->decrement('stock', $item['quantity']);

                // simpan detail
                BorrowingDetail::create([
                    'borrowing_id' => $borrowing->id,
                    'book_id' => $book->id,
                    'quantity' => $item['quantity']
                ]);
            }

            DB::commit();
            return response()->json(['message' => 'Borrowing success']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrowing $borrowing)
    {
        //
        $borrowing->load('member', 'details.book');
        return response()->json($borrowing);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrowing $borrowing)
    {
        //
        $borrowing->load('member', 'details.book');
        return response()->json($borrowing);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        //
        if ($borrowing->status === 'returned') {
            return response()->json(['message' => 'Already returned']);
        }

        foreach ($borrowing->details as $detail) {
            $detail->book->increment('stock', $detail->quantity);
        }

        $borrowing->update([
            'status' => 'returned',
            'return_date' => now()
        ]);

        return response()->json(['message' => 'Book returned']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrowing $borrowing)
    {
        //
        $borrowing->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
