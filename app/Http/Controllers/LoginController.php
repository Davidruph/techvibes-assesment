<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display the login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password) && $user->role === "reader") {
                $request->session()->put('id', $user->id);
                return redirect('reader');
            }elseif(Hash::check($request->password, $user->password) && $user->role === "librarian"){
                $request->session()->put('id', $user->id);
                return redirect('librarian');
            }else{
                return back()->with('error', 'Incorrect password');
            }
        }else{
            return back()->with('error', 'This email is not registered');
        }
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
        return view('readers.index', compact('data'));
    }
    
    /**
     * librarian
     *
     * @return void
     */
   
    
    /**
     * logout
     *
     * @return void
     */
    public function logout(){
        if (Session::has('id')) {
            Session::pull('id');
            return redirect('login');
        }
    }
}
