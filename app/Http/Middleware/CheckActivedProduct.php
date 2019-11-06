<?php

namespace App\Http\Middleware;

use App\Product;
use Closure;

class checkActivedProduct
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
        $product = Product::find($request->id);
//        dd($product->buyer_id);
        if(isset($product) && $product->active == 1)

            if($product->seller_id==null || $product->buyer_id==null)
                return $next($request);
            else
                return redirect('not-found');
        else{
            return redirect('not-found');
        }
    }
}
