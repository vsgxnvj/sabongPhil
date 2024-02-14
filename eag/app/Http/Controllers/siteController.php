<?php

namespace App\Http\Controllers;

use App\Models\site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import the Storage facade
use DB;

class siteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siteslist = site::all();
        return view('admintools.index', compact('siteslist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admintools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'namesite' => 'required|string|max:255', // Example validation rules
            'linksite' => 'required|url', // Adjust as needed
            'descriptionsite' => 'required|string',
            'remarksite' => 'nullable|string',
            'fileimage' => 'required|image|mimes:jpeg,png,bmp|max:2048',
        ]);

        // Handle file upload
        $imagePath = $request->file('fileimage')->store('public/images');
        $imageName = basename($imagePath);

        // Extract validated data
        $site = new site();
        $site->name = $validatedData['namesite'];
        $site->link = $validatedData['linksite'];
        $site->description = $validatedData['descriptionsite'];
        $site->remarks = $validatedData['remarksite'];
        $site->image = $imageName; // assuming 'image' is the attribute name in your Site model for storing image paths

        // Save the site to the database
        $site->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(site $site)
    {
        // Access the ID of the $site model
        $siteId = $site->id;
        $editsite = site::find($siteId);

        return view('admintools.edit', compact('editsite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, site $site)
    {
        $siteId = $site->id;
        $getsitename = site::find($siteId);

        $namesite = $request->namesite;
        $linksite = $request->linksite;
        $descriptionsite = $request->descriptionsite;
        $remarksite = $request->remarksite;

        DB::UPDATE(
            "UPDATE `sites` SET `name`='$namesite',`link`='$linksite',`description`='$descriptionsite',`remarks`='$remarksite' WHERE id = $siteId  "
        );

        return redirect()
            ->back()
            ->with('success', 'Site updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(site $site)
    {
        // Delete the associated picture file from storage
        if ($site->image) {
            Storage::delete('public/images/' . $site->image);
        }

        $site->delete();
        return redirect()->back();
    }
}
