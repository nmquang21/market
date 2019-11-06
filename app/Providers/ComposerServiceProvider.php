<?php

namespace App\Providers;

use App\Category;
use App\WishList;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use function foo\func;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            '*',
            function ($view){
                if(Auth::guard('customer')->check()){
//                    $customer_id = Auth::guard('customer')->user()->id;
                    $wishlist_product = Auth::guard('customer')->user()->wishList;
                }
                else{
                    $wishlist_product = [];
                }
                $categories = Category::where('parent_id',0)->get();

                if(Auth::guard('customer')->check()){
                    $customer_id = Auth::guard('customer')->user()->id;
                    $datas = Notification::where([['customer_id',$customer_id],['type',0]])->limit(10)->orderBy('created_at','DESC')->get();
                    $productCare =  [];
                    foreach ($datas as $data){
                        $productCare[] = $data->product;
                    }
                    $thongbao = Notification::where([['customer_id',$customer_id],['type','<>',0]])->limit(10)->orderBy('created_at','DESC')->get();
                    foreach ($thongbao as $tb){
                        $tb->product;
                    }
                }
                else{
                    $thongbao =[];
                    $productCare = [];
                }
                $view->with([
                    'categories'=>$categories,
                    'wishlist_product'=>$wishlist_product,
                    'productCare'=>$productCare,
                    'thongbao'=>$thongbao
                ]);
            }
        );
    }
}
