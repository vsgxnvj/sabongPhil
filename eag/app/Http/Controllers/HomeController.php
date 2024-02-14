<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\site;
use App\Models\Cashout;

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
        return view('memberDashboard');
    }

    public function welcome()
    {
        $siteslist = site::all();
        $cashoutlist = Cashout::all();
        return view('welcome', compact('siteslist', 'cashoutlist'));
    }
}
