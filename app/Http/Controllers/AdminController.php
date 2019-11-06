<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getDashboard(){
        $customers = DB::table('customers')->count('id');
        $sellers = DB::table('products')->distinct()->count('seller_id');
        $buyers = DB::table('products')->distinct()->count('buyer_id');
        $revenue = [];
        $profits = [];
        $orders = [];
        for ($i=1; $i<=12 ; $i++) {
            $stats = DB::table('products')
                ->whereMonth('buy_date', '=', $i)
                ->where('status', 0)
                ->where('buyer_id', '<>', null)
                ->sum('price');
            $profit = $stats * 0.05;
            array_push($revenue, $stats);
            array_push($profits, $profit);

            $orderCount = DB::table('products')
                ->whereMonth('buy_date', '=', $i)
                ->where('status', 0)
                ->where('buyer_id', '<>', null)
                ->count('id');
            array_push($orders, $orderCount);
        }

        return view('admin.dashboard', compact('revenue', 'orders', 'customers', 'sellers', 'buyers', 'profits'));
    }

    public function test(Request $request){
        return $request;
    }
}
