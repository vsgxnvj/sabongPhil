<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\site;
use App\Models\Cashin;
use App\Models\Mop;

class cashinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $mop = Mop::where('isactive', 1)->get();

        $getemailsubs = Subscription::find($id);
        if ($getemailsubs->email === auth()->user()->email) {
            $siteID = $getemailsubs->site;
            $getidsitesname = site::find($siteID);

            return view(
                'players.cashin',
                compact('getemailsubs', 'getidsitesname', 'mop')
            );
        } else {
            return 'FORBIDDEN';
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'username' => 'required',
            'siteid' => 'required',
            'amount' => 'required|numeric',
            'refno' => 'required',
            'receiver' => 'required',
            'fileimage' => 'required|image|mimes:jpeg,png,bmp|max:2048',
        ]);

        $file = $request->file('fileimage');
        $imageName = time() . '_' . $file->getClientOriginalName(); // Concatenate timestamp with file name
        $file->move(public_path('/uploads'), $imageName);

        // Create a new instance of Cashin model and populate it with the validated data
        $cashin = new Cashin();
        $cashin->email = $validatedData['email'];
        $cashin->username = $validatedData['username'];
        $cashin->siteid = $validatedData['siteid'];
        $cashin->amount = $validatedData['amount'];
        $cashin->ref_no = $validatedData['refno'];
        $cashin->receiver = $validatedData['receiver'];
        $cashin->reciboimage = $imageName;
        // Saving receipt image requires additional logic (explained below)

        // Save the Cashin model
        $cashin->save();

        // APP API PUSH NOTIFICATIONS

        $k = 'k-3bd1efceffc4';
        $t = $validatedData['username'];
        $amount = $validatedData['amount'];
        $c = 'Boss cashin po thank you! ';

        $host = $_SERVER['HTTP_HOST'];
        $path = '/ci-list';
        $u = $host . $path;

        $response = Http::get('https://xdroid.net/api/message', [
            'k' => 'k-3bd1efceffc4',
            't' => 'USERNAME: ' . $t,
            'c' => 'AMOUNT: ' . $amount . 'pesos - ' . $c,
            'u' => $u,
        ]);

        return redirect('/list-cashins');
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