<?php

namespace App\Http\Controllers;

use App\Address;
use App\Category;
use App\CommentProduct;
use App\Customer;
use App\CustomerNotification;
use App\CustomerRate;
use App\Product;
use App\ProductCategory;
use App\ProductImage;
use App\TopProduct;
use App\View;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{

    var $product;
    public function saveProducts(Request $request){
//                  nTransaction();
//        try {
        $customer_id = $request->customer_id;
        $customer_star = CustomerRate::where([['customer_id',$customer_id],['active',1]])->avg('star');
            if($request->status ==0){
                $product = new Product();
                    $product->name = $request->name;
                    $product->customer_id=$request->customer_id;
                    $product->seller_id=$request->customer_id;
                    $product->detail=$request->detail;
                    $product->price=$request->price;
                    $product->new=$request->new;
                    $product->status=$request->status;
                    if($customer_star!=null && $customer_star>=4.3){
                        $product->active = 1;
                    }
                $product->save();
            }
            else if($request->status ==1){
                $product = new Product();
                $product->name = $request->name;
                $product->customer_id=$request->customer_id;
                $product->buyer_id=$request->customer_id;
                $product->detail=$request->detail;
                $product->price=$request->price;
                $product->new=$request->new;
                $product->status=$request->status;
                if($customer_star!=null && $customer_star>=4.3){
                    $product->active = 1;
                }
                $product->save();
            }
            $this->product = $product;
            $address = Address::create([
                'product_id' => $product->id,
                'province_id' => $request->province,
                'district_id' => $request->district,
                'ward_id' => $request->ward,
                'village_id' => $request->village,
            ]);
            View::insert([
                'product_id' => $product->id,
            ]);
            ProductCategory::insert(
                [
                    'product_id' => $product->id,
                    'category_id' =>$request->category,
                ]);
            ProductCategory::insert([
                    'product_id' => $product->id,
                    'category_id' =>$request->category_child,
                ]);
            $product_images = ProductImage::where('product_id',0)->get();
            foreach ($product_images as $product_image){
                $product_image->update(['product_id'=>$product->id]);
            }
            //send mail
            //dd($this->product->customer->email);
//            $product->customer;
//            $data =(array)  $this->product;
//            $data =['customer_name'=>$product->customer->name,'product_name'=>$product->name];
//            Mail::send('Email.mail-content',$data,function ($message){
//                $message->to($this->product->customer->email)->subject('Đăng sản phẩm thành công');
//            });

           // DB::commit();
        return redirect(HOME_PAGE)->with('message-success','Đăng sản phẩm thành công, vui lòng chờ kiểm duyệt!!');

//        } catch (Exception $e) {
//            DB::rollBack();
//
//            throw new Exception($e->getMessage());
//        }
    }

    function postImages(Request $request)
    {
        if ($request->ajax()) {
            if ($request->hasFile('file')) {
                $imageFiles = $request->file('file');
                // set destination path
                //$product_id = Product::max('id')+1;
                $product_id = '0';
                $folderDir = 'uploads/product_images';
                $destinationPath = base_path() . '/' . $folderDir;
                // this form uploads multiple files
                foreach ($request->file('file') as $fileKey => $fileObject) {
                    // make sure each file is valid
                    if ($fileObject->isValid()) {
                        // make destination file name
                        $destinationFileName = time() . $fileObject->getClientOriginalName();
                        // move the file from tmp to the destination path
                        $fileObject->move($folderDir, $destinationFileName);
                        // save the the destination filename
                        $prodcuctImage = new ProductImage();
                        $prodcuctImage->image_path = $folderDir .'/'. $destinationFileName;
                        $prodcuctImage->image_name = $fileObject->getClientOriginalName();
                        $prodcuctImage->product_id = $product_id;
                        $prodcuctImage->save();
                    }
                }
            }
        }
    }
    function deleteImages(Request $request)
    {
//        return $request;
        if ($request->ajax()) {
            ProductImage::where([['image_name',$request->id],['product_id',0]])->delete();
            return "success!!";
        }
    }

    public function postCommentProduct(Request $request){
        $comment = new CommentProduct($request->all());
        $comment->save();
        $customer = $comment->customer;
        return $comment;
    }

    public function deleteProduct(Request $request){
        $id = $request->id;
        $product = Product::find($id);
        $product->delete();

        return redirect('posted-product/'.$product->customer->id);
    }
    public function getProductLatest(Request $request){
        $category_id = $request->category_id;
        $products =  Product::
        join('product_categories', 'products.id', '=', 'product_categories.product_id')
            ->join('categories', 'categories.id', '=', 'product_categories.category_id')
            ->where([['categories.id',$category_id],['products.active',1],['seller_id',null]])
            ->orWhere([['categories.id',$category_id],['products.active',1],['buyer_id',null]])
            ->select('products.*')
            ->orderBy('created_at','DESC')
            ->limit(12)
            ->get();
       foreach ($products as $product){
           $product->images;
           $product->customer;
       }
        return $products;
    }
    public function getProductCare(Request $request){
        $category_id = $request->category_id;
        $products =  Product::
        join('product_categories', 'products.id', '=', 'product_categories.product_id')
            ->join('categories', 'categories.id', '=', 'product_categories.category_id')
            ->join('views','products.id','=','views.product_id')
            ->where([['categories.id',$category_id],['products.active',1],['seller_id',null]])
            ->orWhere([['categories.id',$category_id],['products.active',1],['buyer_id',null]])
            ->select('products.*','views.view')
            ->orderBy('views.view','DESC')
            ->limit(6)
            ->get();
        foreach ($products as $product){
            $product->images;
            $product->customer;
        }
        return $products;
    }


    public function showChart(Request $request)
    {
        $revenue = [];
        $orders = [];
        for ($i=1; $i<=12 ; $i++) {
            $stats = DB::table('products')
                ->where('customer_id', $request->id)
                ->whereMonth('buy_date', '=', $i)
                ->where('status', 0)
                ->where('buyer_id', '<>', null)
                ->sum('price');
            array_push($revenue, $stats);

            $orderCount = DB::table('products')
                ->where('customer_id', $request->id)
                ->whereMonth('buy_date', '=', $i)
                ->where('status', 0)
                ->where('buyer_id', '<>', null)
                ->count('id');
            array_push($orders, $orderCount);
        }

        return view('Pages.product.index', compact('revenue', 'orders'));
    }

    //active product

    public function getListProduct(){
        $product = Product::where('active',0)->get();
        return view('admin.posted-product.post-product')->with('product',$product);
    }
    public function activeProduct(Request $request){
        $product = Product::find($request->product_id);
        $product->active = 1;
        $product->save();

        //send notification
        $category =  $product->category()[1];
        $signedNotification = CustomerNotification::where('category_id',$category['id'])->select('customer_id')->get();
        if($signedNotification){
            foreach ($signedNotification as $notifi){
                $notification = Notification::where([['customer_id',$notifi['customer_id']],['product_id',$request->product_id]])->first();
                if(!$notification)
                    Notification::create([
                    'product_id'=>$request->product_id,
                    'customer_id'=>$notifi['customer_id']
                ]);
            }
        }
    }

    public function productActived(){
        $product = Product::where('active',1)->paginate(10);
        return view('admin.posted-product.list-product')->with('product',$product);
    }

    public function addToTop(Request $request){
        $product_id =  $request->idProduct;
        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);
        $top = TopProduct::where('product_id',$product_id)->first();
        if(isset($top)){
           return 0;
        }
        else{
            if($customer->wallet < 150000){
                return -1;
            }
            $customer->wallet = $customer->wallet-150000;
            $customer->update([
                'wallet' => $customer->wallet-150000
            ]);
            $top = new TopProduct();
            $top->product_id =$product_id;
            $top->save();
            return 1;
        }
    }
    public function topProduct(){
        $productTop = Product::join('top_products','products.id','=','top_products.product_id')
            ->where([['products.active',1],['products.seller_id',null]])
            ->orwhere([['products.active',1],['products.buyer_id',null]])
            ->select('products.*')
            ->orderBy('top_products.updated_at','DESC')->paginate(10);
        return view('admin.product.top-product')->with('topProduct',$productTop);
    }
    public function deleteTop(Request $request){
        $product_id =  $request->product_id;
        TopProduct::where('product_id',$product_id)->delete();
        return 'success';
    }
    public function filter($filterPrice, $fiterCC){

    }
    public function filterProduct(Request $request){
        $price = $request->filterPrice;
        $can = $request->filterCC;
        $price1 = -1; $price2 = -1;
        $status = -1;
        switch ($price){
            case 'p1':
                $price1 = 0;
                $price2 = 2000000;
                break;
            case 'p2':
                $price1 = 2000000;
                $price2 = 4000000;
                break;
            case 'p3':
                $price1 = 4000000;
                $price2 = 6000000;
                break;
            case 'p4':
                $price1 = 6000000;
                $price2 = 10000000;
                break;
            case 'p5':
                $price1 = 10000000;
                $price2 = -1;
                break;
        }
        switch ($can){
            case'cc1':
                $status = 1;
                break;
            case 'cc2':
                $status =0;
                break;
        }
        if($can == null){
            if($price2 == -1){
                $product = Product::join('product_categories', 'products.id', '=', 'product_categories.product_id')
                    ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                    ->join('views','products.id','=','views.product_id')
                    ->where([['products.price','>',$price1],['categories.id',$request->category],['products.active',1],['seller_id',null]])
                    ->orwhere([['products.price','>',$price1],['categories.id',$request->category],['products.active',1],['buyer_id',null]])
                    ->select('products.*','views.view')->get();
            }
            else{
                $product = Product::join('product_categories', 'products.id', '=', 'product_categories.product_id')
                    ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                    ->join('views','products.id','=','views.product_id')
                    ->where([['products.price','>',$price1],['products.price','<',$price2],['categories.id',$request->category],['products.active',1],['seller_id',null]])
                    ->orwhere([['products.price','>',$price1],['products.price','<',$price2],['categories.id',$request->category],['products.active',1],['buyer_id',null]])
                    ->select('products.*','views.view')->get();
            }
        }
        else if($price1 == -1){
            $product = Product::join('product_categories', 'products.id', '=', 'product_categories.product_id')
                ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                ->join('views','products.id','=','views.product_id')
                ->where([['products.status',$status],['categories.id',$request->category],['products.active',1],['seller_id',null]])
                ->orwhere([['products.status',$status],['categories.id',$request->category],['products.active',1],['buyer_id',null]])
                ->select('products.*','views.view')->get();
        }
        else{
            if($price2 == -1){
                $product = Product::join('product_categories', 'products.id', '=', 'product_categories.product_id')
                    ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                    ->join('views','products.id','=','views.product_id')
                    ->where([['products.price','>',$price1],['categories.id',$request->category],['products.status',$status],['products.active',1],['seller_id',null]])
                    ->orwhere([['products.price','>',$price1],['categories.id',$request->category],['products.status',$status],['products.active',1],['buyer_id',null]])
                    ->select('products.*','views.view')->get();
            }
            else{
                $product = Product::join('product_categories', 'products.id', '=', 'product_categories.product_id')
                    ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                    ->join('views','products.id','=','views.product_id')
                    ->where([['products.price','>',$price1],['products.price','<',$price2],['products.status',$status],['categories.id',$request->category],['products.active',1],['seller_id',null]])
                    ->orwhere([['products.price','>',$price1],['products.price','<',$price2],['products.status',$status],['categories.id',$request->category],['products.active',1],['buyer_id',null]])
                    ->select('products.*','views.view')->get();
            }
        }
        foreach ($product as $item){
            $item->images;
            $item->customer;
        }
        return $product;
    }
}
