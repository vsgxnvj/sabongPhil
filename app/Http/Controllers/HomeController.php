<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\site;
use App\Models\Cashout;
use App\Models\Cashin;
use App\Models\Subscription;
use App\Models\Payout;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = auth()->user()->role;

        $result = Subscription::join('sites', 'subscriptions.site', '=', 'sites.id')
            ->select('subscriptions.*', 'sites.name', 'sites.link', 'sites.image', 'sites.id AS site_id', 'sites.id AS subscription_site_id')
            ->where('subscriptions.email', '=', auth()->user()->email)
            ->get();

        if ($role == 1) {
            $countCashin = Cashin::where('isPending', 0)->count();
            $countCashout = Payout::where('status', 0)->count();
            $countSubscription = Subscription::join('sites', 'subscriptions.site', '=', 'sites.id')->where('subscriptions.sitestatus', 0)->count();
          

            $user = User::count();
          
            return view('memberDashboard', compact('result', 'countCashin', 'countCashout', 'countSubscription','user'));
        } else {
            return view('memberDashboard', compact('result'));
        }
    }

    public function welcome()
    {
        $siteslist = site::all();
        $cashoutlist = Cashout::all();

        return view('welcome', compact('siteslist', 'cashoutlist'));
    }
}
