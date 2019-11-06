<?php

namespace App\Http\Controllers;

use App\CustomerRate;
use App\UserRate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RateController extends Controller
{
    public function postRateUser(Request $request){
        $userRate = CustomerRate::where([['customer_id',$request->customer_id],['customer_rate_id',$request->customer_rate_id]])->first();
        if(!$userRate){
            $userRate = new CustomerRate($request->all());
            $userRate->save();
            return 'new';
        }
        else{
            $userRate->update([
                'star'=>$request->star,
                'comment'=>$request->comment,
                'active'=>0
            ]);
            return 'update';
        }

    }
}
