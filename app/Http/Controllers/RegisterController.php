<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required',
            'profile_image' => 'required'
        ]);
        $user = new User();
        $user->role = "reader";
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($request->hasfile('profile_image')) {
            $image = $request->file('profile_image');
            $image_extension = $image->getClientOriginalExtension();
            $image_filename = time().'.'.$image_extension;
            $image->move('readers/image/', $image_filename);
            $user->profile_image = $image_filename;
        }
        $result = $user->save();
        if ($result) {
            return back()->with('success', 'You have registered successfully, kindly login');
        }else {
            return back()->with('error', 'An error occured');
        }
    }
}
