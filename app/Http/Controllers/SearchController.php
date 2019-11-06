<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function searchByName(Request $request)
    {
        $products = Product::where([['name', 'like', '%' . $request->value . '%'],['active',1],['seller_id',null]])
            ->orwhere([['name', 'like', '%' . $request->value . '%'],['active',1],['buyer_id',null]])
            ->get();

        return response()->json($products);
    }

    public function searchByCategory(Request $request)
    {
        $categories = Category::where('name', 'like', '%' . $request->value . '%')->get();

        return response()->json($categories);
    }
}
