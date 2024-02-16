<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Models\Payout;
use App\Models\Subscription;
use App\Models\Cashin;
use App\Models\site;

class payoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getall = Payout::all();
        return view('admintools.cashouts.cashoutlist', compact('getall'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($username)
    {
        $siteci = Subscription::where('username', $username)->get();

        $site = $siteci->first()->site;

        return view('players.cashout', compact('username', 'site'));
    }

    public function cashins()
    {
        $getallci = Cashin::join('sites', 'cashins.siteid', '=', 'sites.id')
            ->select(
                'cashins.*',
                'sites.*',
                'sites.id as site_id',
                'cashins.id as ciId',
                'cashins.remarks as cremarks'
            )
            ->get();
 
        return view('admintools.cashins.index', compact('getallci'));
    }

    public function recieved(Request $request)
    {
        $validatedData = $request->validate([
            'subId' => 'required',
        ]);

        $subId = $request->input('subId');

        $Cashin = Cashin::find($subId);

        // Update the record with the required changes
        $Cashin->ispending = 1;
        $Cashin->remarks = 'RECEIVED';
        $Cashin->approved_date = date('Y-m-d');

        // Save the changes to the database
        $Cashin->save();

        return redirect()
            ->back()
            ->with('success', 'Operation completed successfully.');
    }

    public function rejected(Request $request)
    {
        $validatedData = $request->validate([
            'subId' => 'required',
        ]);

        $subId = $request->input('subId');

        $Cashin = Cashin::find($subId);

        // Update the record with the required changes
        $Cashin->ispending = 2;
        $Cashin->remarks = 'Please check your receipt';
        $Cashin->approved_date = date('Y-m-d');

        // Save the changes to the database
        $Cashin->save();

        return redirect()
            ->back()
            ->with('success', 'Operation completed successfully.');
    }

    public function cashoutreject(Request $request)
    {
        $coId = $request->coId;
        Payout::where('id', $coId)->update(['status' => 2]);
        return redirect()
            ->back()
            ->with('success', 'Rejected successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siteId' => 'required',
            'username' => 'required|string|max:255',
            'amount' => 'required|integer',
            'bankname' => 'required|string|max:255',
            'accountno' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        try {
            $co = new Payout();
            $co->site = $validatedData['siteId'];
            $co->username = $validatedData['username'];
            $co->bankname = $validatedData['bankname'];
            $co->amount = $validatedData['amount'];
            $co->accountno = $validatedData['accountno'];
            $co->fullname = $validatedData['fullname'];
            $co->email = $validatedData['email'];

            $co->save();

            // APP API PUSH NOTIFICATIONS

            $k = 'k-3bd1efceffc4';
            $t = $validatedData['username'];
            $amount = $validatedData['amount'];
            $c =
                ' I would like to request the processing of a withdrawal. Could you please assist me with this matter at your earliest convenience? Thank you for your prompt attention.';

            $host = $_SERVER['HTTP_HOST'];
            $path = '/co-list';
            $u = $host . $path;

            $response = Http::get('https://xdroid.net/api/message', [
                'k' => 'k-3bd1efceffc4',
                't' => 'USERNAME: ' . $t,
                'c' => '[AMOUNT: ' . $amount . ' pesos]  ' . $c,
                'u' => $u,
            ]);

            return redirect('/list-cashout')->with(
                'success',
                'Data saved successfully!'
            );
        } catch (\Exception $e) {
            return redirect('/list-cashout')->with('error', $e->getMessage());
        }
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
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'hiddenID' => 'required|integer',
            'recibo' => 'nullable|image|mimes:jpeg,png,bmp|max:2048', // Update to allow the field to be nullable
        ]);

        $file = $request->file('recibo');
        $imageName = time() . '_' . $file->getClientOriginalName(); // Concatenate timestamp with file name
        $file->move(public_path('/uploads'), $imageName);

        // Find the record by ID
        $model = Payout::findOrFail($request->input('hiddenID'));

        // Update the model's values
        $model->status = 1;
        $model->receipt = $imageName;

        // Save the changes
        $model->save();

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