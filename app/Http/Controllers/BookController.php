<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::with('category')->get();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'publisher'   => 'nullable|string|max:255',
            'year'        => 'required|integer',
            'stock'       => 'required|integer|min:0',
        ]);

        Book::create([
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'author'      => $request->author,
            'publisher'   => $request->publisher,
            'year'        => $request->year,
            'stock'       => $request->stock,
        ]);

        return redirect()->route('books.index')
            ->with('success', 'Book successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        $categories = Category::all();

        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'publisher'   => 'nullable|string|max:255',
            'year'        => 'required|integer',
            'stock'       => 'required|integer|min:0',
        ]);

        $book->update([
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'author'      => $request->author,
            'publisher'   => $request->publisher,
            'year'        => $request->year,
            'stock'       => $request->stock,
        ]);
        return redirect()->route('books.index')
            ->with('success', 'Book successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book successfully deleted');
    }
}
