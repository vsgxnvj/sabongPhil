<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cashin;
use App\Models\Subscription;
use App\Models\Payout;
use App\Models\site;

class transactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function cashins()
    {
        $email = auth()->user()->email;

        $cashin = Cashin::join('sites', 'cashins.siteid', '=', 'sites.id')
            ->orderByDesc('cashins.id')
            ->select(
                'cashins.*',
                'sites.*',
                'sites.name as site_name',
                'cashins.created_at as dateci'
            )
            ->where('email', $email)
            ->whereDate('cashins.created_at', '>=', now()->subDays(3))
            ->take(5)
            ->get();
        return view('players.transactions.cashin', compact('cashin'));
    }

    public function cashouts()
    {
        $email = auth()->user()->email;
        // $getallcorequest = Payout::where('email', $email)->get();
        $getallcorequest = Payout::join(
            'sites',
            'payouts.site',
            '=',
            'sites.id'
        )
            ->where('payouts.email', $email)
            ->orderByDesc('payouts.id')
            ->select('payouts.*', 'sites.*', 'sites.id as site_id')
            ->get();
        return view('players.transactions.cashout', compact('getallcorequest'));
    }

    public function deactivated()
    {
        $email = auth()->user()->email;

        $subcript = Subscription::join(
            'sites',
            'sites.id',
            '=',
            'subscriptions.site'
        )
            ->select('sites.*', 'subscriptions.*')
            ->where('email', $email)
            ->where('isactive', 0)
            ->get();

        return view('players.deactivated', compact('subcript'));
    }

    public function deactivatedUpdate($id)
    {
        Subscription::find($id)->update(['isactive' => 1]);

        return redirect()->back();
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
        //
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
