<?php

namespace App\Http\Middleware;

use App\Product;
use Closure;
use Illuminate\Support\Facades\Auth;

class DeleteProduct
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('customer')->check()){
            $customer_id1 = Auth::guard('customer')->user()->id;
            $customer_id2 = Product::find($request->id)->customer->id;
            if($customer_id1 == $customer_id2)
                return $next($request);
            else
                return redirect('not-found');
        }
        return redirect('not-found');

    }
}
