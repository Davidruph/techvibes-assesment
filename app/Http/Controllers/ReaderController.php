<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReaderController extends Controller
{  
    /**
     * search books
     *
     * @return void
     */
    public function search(Request $request)
    {
        $request->validate([
            'search_field' => 'required'
        ]);
        $search_item = $request->search_field;
        $books = Book::where('isbn', 'like', "%{$search_item}%")
                  ->orWhere('title', 'like', "%{$search_item}%")
                  ->orWhere('published_date', 'like', "%{$search_item}%")
                  ->orWhere('publisher', 'like', "%{$search_item}%")->get();

        $data = array();
        if (Session::has('id')) {
            $data  = User::where('id', '=', Session::get('id'))->first();
        }
        return view('readers.search', compact('data', 'books'));
    }

    /**
     * readers
     *
     * @return void
     */
    public function readers(){
        $data = array();
        if (Session::has('id')) {
            $data  = User::where('id', '=', Session::get('id'))->first();
        }
        $books = Book::all();
        return view('readers.index', compact('data', 'books'));
    }
    
    /**
     * show_check_out_form
     *
     * @return void
     */
    public function show_check_out_form()
    {
        $data = array();
        if (Session::has('id')) {
            $data  = User::where('id', '=', Session::get('id'))->first();
        }
        $books = Book::all();
        return view('readers.check_out_form', compact('data', 'books'));
    }
    
    /**
     * borrow_a_book
     *
     * @param  mixed $request
     * @return void
     */
    public function borrow_a_book(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'book' => 'required',
            'check_out_date' => 'required'
        ]);

        $checkout = new Booking();
        $checkout->mode = "check out";
        $checkout->name = $request->name;
        $checkout->email = $request->email;
        $checkout->book = $request->book;
        $checkout->check_out_date = $request->check_out_date;

        $result = $checkout->save();
        if ($result) {
            return back()->with('success', 'You have borrowed'." ".$request->book.', ' .'Pls return it within 10 days.');
        }else {
            return back()->with('error', 'An error occured');
        }
    }

    /**
     * show_check_in_form
     *
     * @return void
     */
    public function show_check_in_form()
    {
        $data = array();
        if (Session::has('id')) {
            $data  = User::where('id', '=', Session::get('id'))->first();
        }
        $books = Book::all();
        return view('readers.check_in_form', compact('data', 'books'));
    }

    /**
     * return_a_book
     *
     * @param  mixed $request
     * @return void
     */
    public function return_a_book(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'book' => 'required',
            'check_in_date' => 'required'
        ]);

        $checkout = new Booking();
        $checkout->mode = "check in";
        $checkout->name = $request->name;
        $checkout->email = $request->email;
        $checkout->book = $request->book;
        $checkout->check_in_date = $request->check_in_date;

        $result = $checkout::where('book', $request->book)->update(['name' => $checkout->name, 'email' => $checkout->email, 'book' => $checkout->book, 'mode' => $checkout->mode, 'check_in_date' => $checkout->check_in_date]);
        if ($result) {
            return back()->with('success', 'You have returned'." ".$request->book);
        }else {
            return back()->with('error', 'An error occured');
        }
    }
}
