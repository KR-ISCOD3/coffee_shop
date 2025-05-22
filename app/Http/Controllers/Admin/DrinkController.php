<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $drinks = Drink::all();
       return view('drinks',compact('drinks'));
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
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image',
            'category_id' => 'required|integer',
            'small_price' => 'required|numeric',
            'medium_price' => 'required|numeric',
        ]);

        $filename = null;
        if($request->hasFile('image')){
            $filename = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$filename);
        }

        Drink::create([
            'name'=>$request->name,
            'image'=>$filename,
            'category_id'=>$request->category_id,
            'small_price'=>$request->small_price,
            'medium_price'=>$request->medium_price,
        ]);

        return redirect()->route('drinks.admin')->with('success', 'Drink added successfully');

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
    public function destroy(Request $request)
    {
        $drink = Drink::findOrFail($request->id);

        if ($drink->image && file_exists(public_path('uploads/' . $drink->image))) {
            unlink(public_path('uploads/' . $drink->image));
        }

        $drink->delete();

        return redirect()->back()->with('success', 'Drink deleted successfully.');
    }
}
