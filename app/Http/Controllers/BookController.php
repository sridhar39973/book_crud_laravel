<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    //
    public function index(){
        echo "index V1 is working fine";
    }

    public function displayCreatePage(){
        return view ('book.renderCreate');
    }

    public function createBook(Request $request){
        $data = $request->validate([
            'name'=> 'required|string',
            'author' => 'required|string',
            'price' => 'required|numeric|min:0'
        ]);
        Book::create($data);
        return redirect()->route('book.renderCreate')->with('success', 'Book inserted successfully');    
    }

    public function listBooks(){
        $book = Book::all();
        return view('book.renderBooks', ['book'=>$book]);
    }
    public function renderUpdateBookPage(Book $book){
        return view ('book.updateBook', ['b'=> $book]);
    }
    public function updateBook(Book $book, Request $request){
        $data = $request->validate([
            'name'=> 'required|string',
            'author' => 'required|string',
            'price' => 'required|numeric|min:0'
        ]);
        $book->update($data);
        return redirect('/v1/getBooks')->with('success', 'book details updated successfully');
    }
    public function deleteBook(Book $book, Request $request){
            $book->delete();
            return redirect('/v1/getBooks')->with('success', 'book details deleted successfully');
    }
}
