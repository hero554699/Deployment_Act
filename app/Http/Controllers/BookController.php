<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::all();
        
        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function store(Request $request)
    {
        Book::create([
            'name' => $request->bookname,
            'author' => $request->bookauthor,
            'stock' => $request->bookstock,
            'date' => $request->bookdate,
        ]);
        return redirect('books');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', [
            'book' => $book,
        ]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update([
            'name' => $request->bookname,
            'author' => $request->bookauthor,
            'stock' => $request->bookstock,
            'date' => $request->bookdate,
        ]);
        return redirect('books');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('books');
    }
}
