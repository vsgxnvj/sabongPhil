<?php

namespace App\Http\Controllers;
use App\Models\Cashout;

use Illuminate\Http\Request;

class cashoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getall = Cashout::all();
        return view('admintools.cashouts.index', compact('getall'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admintools.cashouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'username' => 'required|string|max:255', // Example validation rules
            'cashout' => 'required|integer',
            'sitename' => 'nullable|string',
            'cashoutimage' => 'required|image|mimes:jpeg,png,bmp|max:2048',
        ]);

        // Handle file upload
        $file = $request->file('cashoutimage');
        $filename = time() . '_' . $file->getClientOriginalName();
        $location = public_path('uploads');
        $file->move($location, $filename);

        // Extract validated data
        $Cashout = new Cashout();
        $Cashout->username = $validatedData['username'];
        $Cashout->cashout = $validatedData['cashout'];
        $Cashout->sitename = $validatedData['sitename'];
        $Cashout->images = $filename;

        // Save the site to the database
        $Cashout->save();

        return redirect()->back();
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
        // Delete the cashout
        // $cashout->delete();

        Cashout::find($id)->delete();

        // // Redirect back or to a specific route
        return redirect()->back();
    }
}
