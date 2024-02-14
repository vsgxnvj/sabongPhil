<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mop;

class mopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mop = Mop::all();
        return view('admintools.mop.index', compact('mop'));
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
        $validatedData = $request->validate([
            'bankname' => 'required',
            'fullname' => 'required|string|max:255',
            'accountno' => 'required',
        ]);

        $mop = new Mop();

        $mop->bankname = $validatedData['bankname'];
        $mop->fullname = $validatedData['fullname'];
        $mop->accountno = $validatedData['accountno'];

        // Save the model to the database
        $mop->save();

        return redirect()->back()->with('success', 'New Mode of Payment successfully added');
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

          Mop::query()->update(['isactive' => 0]);
          
        $mop = Mop::find($id);

        
        $mop->isactive = 1; // Set the `isactive` column to 1
        $mop->save();

       return redirect()->back()->with('success', 'Successfully Enabled');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

       
        
       $id = $request->input('deleteID');



       $mop = Mop::find($id);
       $mop->delete();

        return redirect()->back()->with('success', 'Successfully Deleted');
    }
}
