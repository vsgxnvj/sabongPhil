<?php

namespace App\Http\Controllers;
use App\Models\site;
use App\Models\Subscription;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class listgameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listgames = site::all();
        return view('players.list-games', compact('listgames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $singleSite = site::find($id);
        return view('players.register-games', compact('singleSite'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usernm = $request['username'] . '_sp';
        $validatedData = $request->validate([
            'email' => 'required',
            'siteid' => 'required',
            'username' => ['required', 'unique:subscriptions', Rule::notIn([$usernm])],
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        // Create a new instance of the Subscription model
        $subscription = new Subscription();

        // Assign the validated data to the model's properties
        $subscription->email = $validatedData['email'];
        $subscription->site = $validatedData['siteid'];
        $subscription->username = $usernm;
        $subscription->password = $validatedData['password'];

        // Save the model to the database
        $subscription->save();

        return redirect()->route('home');
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
    public function update(string $id)
    {
        $subscription = Subscription::find($id);
    
        if ($subscription) {
            $subscription->isactive = 0;
            $subscription->save();
        }

        return redirect()->back();
    }


    public function enableAccount(string $id)
    {
        $subscription = Subscription::find($id);
    
        if ($subscription) {
            $subscription->isactive = 1;
            $subscription->save();
        }

        return redirect()->back();
    }


    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
