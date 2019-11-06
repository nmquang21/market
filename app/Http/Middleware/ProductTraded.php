<?php

namespace App\Http\Middleware;

use App\Product;
use Closure;

class ProductTraded
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
        $product_id = $request->id;
        $product = Product::find($product_id);

        if($product->seller_id!=null || $product->buyer_id!=null)
            return $next($request);
        else
            return redirect('not-found');
    }
}
