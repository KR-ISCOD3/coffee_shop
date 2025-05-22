<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (auth()->check()) {
        //     if (auth()->user()->role === 'admin') {
        //         return redirect()->route('dashboard.admin');
        //     } elseif (auth()->user()->role === 'cashier') {
        //         return redirect()->route('dashboard.cashier');
        //     }
        // }

        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // check input type
        $validator = Validator::make($request->all(),[
            "user_or_email"=>'required|string',
            "password"=>'required|string',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userOremail = $request->input('user_or_email');
        $user = null;


        // find user account
        if(filter_var($userOremail,FILTER_VALIDATE_EMAIL)){
            $user = User::where('email',$userOremail)->first();
        }else{
            $user = User::where('name',$userOremail)->first();
        }

        // $user = [
        //     "id"=>2,
        //     "email"=>"john@gmail.com",
        //     "name"=>"john",
        //     "password"=>"1231231"
        // ];

        if($user && $user->password === $request->input("password")){
            Auth::login($user);

            if($user->role === "admin"){
                return redirect()->route('dashboard.admin')->with('success', 'Welcome back!');
            }else if($user->role === "cashier"){
                return redirect()->route('dashboard.cashier')->with('success', 'Welcome back!');
            }

        }

        return back()->withErrors(['login' => 'Invalid credentials provided.'])->withInput();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
