<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paid; 
use App\Models\user;
use App\Models\WebsiteSetting;
use Auth;

class AccountUpgradeController extends Controller
{
    public function upgrade(){
            // $user = auth()->user();
            // after approver redirect user dashboard
            // if ($user->upgrade_at) {
            //     return redirect()->route('user.dashboard');
            // }

            $user = auth()->user();
            // Upgrade and  expired
            if (
                $user->upgrade_at &&
                $user->upgrade_expired_at &&
                now()->lessThan($user->upgrade_expired_at)
            ) {
                return redirect()->route('user.dashboard');
            }

        $PaidCharg = WebsiteSetting::first();
        return view('account.verify', compact('PaidCharg'));
    }

// post data
public function acpaid(Request $request){

    $PaidCharg = WebsiteSetting::first();

    $validated = $request->validate([
        'ac_number' => 'required',
        'ac_type'   => 'required',
        'amount'    => [
            'required',
            'numeric',
            'min:' . $PaidCharg->paid_charg,
        ],
        'tran_id'   => 'required| unique:paids',

    ],

    [
    'tran_id.unique'=>'Transaction id already used',
    ]
   
    );
     
     $user = Auth::user();

     $existCheck = Paid::where('user_id',$user->id)->first();

     if ($existCheck) {
         $status= $existCheck->status;
         if ($status=="pending") {
           return response()->json([
            'status'  => false,
            'message' => 'Your request alredy pending.'
        ]);
         }

          if ($status=="approved") {
           return response()->json([
            'status'  => false,
            'message' => 'Your account alredy upgrade.'
        ]);
         }
     }
     
     
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
