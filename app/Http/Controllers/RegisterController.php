<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'gender_id'=>'required|in:1,2',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:6',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        User::create([
            'name'=>$validated['name'],
            'gender_id' => $validated['gender_id'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => 'cashier',
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully!');
    }

}
