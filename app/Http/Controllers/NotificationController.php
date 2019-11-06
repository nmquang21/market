<?php

namespace App\Http\Controllers;

use App\CustomerNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;

class NotificationController extends Controller
{
    public function signNotification(Request $request){
        $notifi = CustomerNotification::where([['customer_id',$request->customer_id],['category_id',$request->category_id]])->first();
        if(!$notifi){
            CustomerNotification::create($request->all());
            return 'success';
        }
        return 'da dang ky';
    }
    public function unSignNotification(Request $request){
        CustomerNotification::where([['customer_id',$request->customer_id],['category_id',$request->category_id]])->delete();
        return 'success';
    }
}
