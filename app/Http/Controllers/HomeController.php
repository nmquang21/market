<?php

namespace App\Http\Controllers;

use App\Category;
use App\CommentProduct;
use App\CustomerNotification;
use App\CustomerRate;
use App\Product;
use App\ProductImage;
use App\View;
use App\WatchedProduct;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function queryProduct($categoryId){
        $data = Product::
            join('product_categories', 'products.id', '=', 'product_categories.product_id')
            ->join('categories', 'categories.id', '=', 'product_categories.category_id')
            ->where([['categories.id',$categoryId],['active',1],['seller_id',null]])
            ->orwhere([['categories.id',$categoryId],['active',1],['buyer_id',null]])
            ->select('products.*')
            ->paginate(9);
        return $data;
    }

    public function getHomePage()
    {
        $productTop = Product::join('top_products','products.id','=','top_products.product_id')
            ->where([['products.active',1],['products.seller_id',null]])
            ->orwhere([['products.active',1],['products.buyer_id',null]])
            ->select('products.*')
            ->orderBy('top_products.updated_at','DESC')->limit(12)->get();

//        dd($productTop);
        $watchedProduct =[];
        if(Auth::guard('customer')->check()){
            $watchedProduct = Auth::guard('customer')->user()->watchedProduct;
        }
        $productSellLatest = Product::where([['active',1],['status','1'],['seller_id',null]])
            ->orwhere([['active',1],['status','1'],['buyer_id',null]])
            ->orderBy('created_at','DESC')->limit(8)->get();

        $productBuyLatest = Product::where([['active',1],['status','0'],['seller_id',null]])
            ->orwhere([['active',1],['status','0'],['buyer_id',null]])
            ->orderBy('created_at','DESC')->limit(8)->get();

        $productSellCare = Product::join('views','products.id','=','views.product_id')
            ->where([['active',1],['status','0'],['seller_id',null]])
            ->orwhere([['active',1],['status','0'],['buyer_id',null]])
            ->orderBy('views.view','DESC')->select('products.*','views.view')
            ->limit(8)->get();
        foreach ($productSellCare as $product){
            $image = ProductImage::where('product_id',$product->id)->first();
            if($image)
                 $product->image_path = $image->image_path;
            else
                $product->image_path='uploads/product_images/no-image.jpg';
        }
        $productBuyCare = Product::join('views','products.id','=','views.product_id')
            ->where([['active',1],['status','1'],['seller_id',null]])
            ->orwhere([['active',1],['status','1'],['buyer_id',null]])
            ->orderBy('views.view','DESC')->select('products.*','views.view')
            ->limit(8)->get();
        foreach ($productBuyCare as $product){
            $image = ProductImage::where('product_id',$product->id)->first();
            $product->image_path = $image->image_path;
        }
//        dd($productBuyCare);
        return view('Pages.homepage')->with([
            'productTop'=>$productTop,
            'watchedProduct'=>$watchedProduct,
            'productBuyLatest'=>$productBuyLatest,
            'productSellLatest'=>$productSellLatest,
            'productSellCare'=>$productSellCare,
            'productBuyCare'=>$productBuyCare
        ]);
    }
    public function getBlogsPage(){

        return view('Pages.blogs');
    }
    public function getBlogDetail(){

        return view('Pages.blog-detail');
    }
    public function getAboutPage(){
        return view('Pages.about');
    }
    public function getContact(){
        return view('Pages.contact');
    }
    public function getCategory(Request $request){
        $signNotification='';
        if(Auth::guard('customer')->check()){
            $customer_id = Auth::guard('customer')->user()->id;
            $signNotification =CustomerNotification::where([
                ['category_id',$request->id],
                ['customer_id',$customer_id]
            ])->first();
        }
        $category = Category::find($request->id);
        $parentCategory='';
        if($category->parent_id != 0){
            $parentCategory = Category::find($category->parent_id);
        }
        $subCategories = Category::where('parent_id',$request->id)->get();

        $products = $this->queryProduct($request->id);
//        dd($products);
        //$products = $category->productActived();
        return view('Pages.category')->with([
            'category'=>$category,
            'parentCategory'=>$parentCategory,
            'subCategories'=>$subCategories,
            'products'=>$products,
            'signNotification'=>$signNotification
        ]);
    }
    public function getProductDetail(Request $request){
        $id = $request->id;
        $sessionKey = 'product_' . $id;
        $sessionView = session()->get($sessionKey);
        $view = View::where('product_id',$id)->first();
        if (!$sessionView) {
            session()->put($sessionKey, 1);
            $view->increment('view');
        }
        if(Auth::guard('customer')->check()){
            $customer_id = Auth::guard('customer')->user()->id;
            $watched_product = WatchedProduct::where([['product_id',$id],['customer_id',$customer_id]])->first();
            if(!$watched_product){
                WatchedProduct::create(['product_id'=>$id,'customer_id'=>$customer_id]);
            }
        }

        $product = Product::find($id);

        $product->category2 = $product->category()[1];
        $product->category1 = $product->category()[0];

        $productLatest = Product::where([['active',1],['seller_id',null]])
            ->orwhere([['active',1],['buyer_id',null]])
            ->orderBy('created_at','DESC')->limit(3)->get();

        $relatedProduct = Product::
        join('product_categories', 'products.id', '=', 'product_categories.product_id')
            ->join('categories', 'categories.id', '=', 'product_categories.category_id')
            ->join('views','products.id','=','views.product_id')
            ->where([['categories.id',$product->category2->id],['products.active',1],['seller_id',null]])
            ->orWhere([['categories.id',$product->category2->id],['products.active',1],['buyer_id',null]])
            ->select('products.*','views.view')
            ->orderBy('views.view','DESC')
            ->limit(6)
            ->get();
        foreach ($relatedProduct as $product_){
            $product_->images;
            $product_->customer;
        }
        $temps =[];
        $temps[] = $product->address->village();
        $temps[] = $product->address->ward();
        $temps[] = $product->address->district();
        $temps[] = $product->address->province();
        $address ='';

        foreach ($temps as $temp){
            if($temp !== null){
                $address = $address.$temp.', ';
            }
        }
        $otherProductCustomer = Product::where('customer_id',$product->customer->id)->get();
        $product->address = substr($address,0,strlen($address)-2);

        $productMaybeLike =[];

        $rates = CustomerRate::where([['customer_id',$product->customer->id],['active',1]])->get();
        $comments = CommentProduct::where('product_id',$id)->get();
        return view('Pages.product-detail')->with([
            'product'=>$product,
            'rates'=>$rates,
            'comments'=>$comments,
            'relatedProduct'=>$relatedProduct,
            'productLatest'=>$productLatest,
            'otherProductCustomer'=>$otherProductCustomer
        ]);
    }
    public function getCheckOut(){

        return view('Pages.checkout');
    }
    public  function getCartDetail(){

        return view('Pages.cart-detail');
    }
    public function getPostProduct(){
        if(Auth::guard('customer')->id()){
            return view('Pages.post-product');
        } else {
            return redirect()->route('home');
        }

    }
    public function getNotFound(){
        return view('404_notfound');
    }
    public  function getPostedProduct(Request $request){
        $id = $request->id;
        $needBuy = Product::where([['customer_id',$id],['status',1]])->get();
        $needSell = Product::where([['customer_id',$id],['status',0]])->get();
       return view('Pages.posted-product')->with(['neddBuy'=>$needBuy,'needSell'=>$needSell]);
    }
    public function getTradedProduct(Request $request){
        $id = $request->id;
//        dd($id);
        $bought=Product::where([['buyer_id',$id],['seller_id','<>',null],['active',1]])->get();
        $selled=Product::where([['seller_id',$id],['buyer_id','<>',null],['active',1]])->get();
        return view('Pages.traded-product')->with(['bought'=>$bought,'selled'=>$selled]);

    }
}
