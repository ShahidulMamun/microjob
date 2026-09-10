<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paid;
use App\Models\WebsiteSetting;

class AccountUpgradeController extends Controller
{
    public function upgrade(){
        $PaidCharg = WebsiteSetting::first();
        return view('account.verify', compact('PaidCharg'));
    }

// post data
public function acpaid(Request $request){
    $validated = $request->validate([
        'ac_number' => 'required',
        'ac_type'   => 'required',
        'amount'    => 'required|numeric',
        'tran_id'   => 'required',
    ]);
     
     
    Paid::create([
        'user_id'   => auth()->id(),
        'ac_number' => $validated['ac_number'],
        'ac_type'   => $validated['ac_type'],
        'amount'    => $validated['amount'],
        'tran_id'   => $validated['tran_id'],
    ]);

    return response()->json([
        'status'  => true,
        'message' => 'Request submitted successfully.'
    ]);
}


}
