<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LibrarianController extends Controller
{
    public function index()
    {
        $data = array();
        if (Session::has('id')) {
            $data  = User::where('id', '=', Session::get('id'))->first();
        }
        $books_data = Book::all();
        return view('librarian.index', compact('books_data', 'data'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_user_details()
    {
        $data = array();
        if (Session::has('id')) {
            $data  = User::where('id', '=', Session::get('id'))->first();
        }
        $users_data = User::all();
        return view('librarian.reader_details', compact('users_data', 'data'));
    }
    
    /**
     * upload_books
     *
     * @return void
     */
    public function upload_books()
    {
        $data = array();
        if (Session::has('id')) {
            $data  = User::where('id', '=', Session::get('id'))->first();
        }
        return view('librarian.upload_books', compact('data'));
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:books,title',
            'isbn' => 'required',
            'revision_number' => 'required',
            'published_date' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'cover_page_image' => 'required'
        ]);

        $books = new Book();
        $books->title = $request->title;
        $books->isbn = $request->isbn;
        $books->revision_number = $request->revision_number;
        $books->published_date = $request->published_date;
        $books->publisher = $request->publisher;
        $books->author = $request->author;
        $books->genre = $request->genre;
        
        if ($request->hasfile('cover_page_image')) {
            $image = $request->file('cover_page_image');
            $image_extension = $image->getClientOriginalExtension();
            $image_filename = time().'.'.$image_extension;
            $image->move('books/image/', $image_filename);
            $books->cover_page_image = $image_filename;
        }
        $result = $books->save();
        if ($result) {
            return back()->with('success', 'You have successfully uploaded a new book');
        }else {
            return back()->with('error', 'An error occured');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array();
        if (Session::has('id')) {
            $data  = User::where('id', '=', Session::get('id'))->first();
        }
        $single_book = Book::where('id', '=', $id)->first();
        return view('librarian.edit_book_data', compact('data','single_book'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'isbn' => 'required',
            'revision_number' => 'required',
            'published_date' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'genre' => 'required'
        ]);

        $books = new Book();
        $books->title = $request->title;
        $books->isbn = $request->isbn;
        $books->revision_number = $request->revision_number;
        $books->published_date = $request->published_date;
        $books->publisher = $request->publisher;
        $books->author = $request->author;
        $books->genre = $request->genre;

        $result = $books::where('id', $id)->update(['title' => $books->title, 'isbn' => $books->isbn, 'revision_number' => $books->revision_number, 'published_date' => $books->published_date, 'publisher' => $books->publisher, 'author' => $books->author, 'genre' => $books->genre]);

        if ($result) {
            return back()->with('success', $books->title." ".'book datails has been updated successfully');
        } else {
            return back()->with('error', 'An error occured');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($result = Book::find($id)->delete()) {
            return back()->with('success', 'Book data has been deleted successfully');
        } else {
            return back()->with('error', 'An error occured');
        }
    }
    
    /**
     * checked_out_books
     *
     * @return void
     */
    public function checked_out_books()
    {
        $data = array();
        if (Session::has('id')) {
            $data  = User::where('id', '=', Session::get('id'))->first();
        }
        $book_data = Booking::where('mode', '=', 'check out')->get();
        return view('librarian.checked_out_books', compact('data','book_data'));
    }
}
