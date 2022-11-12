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
