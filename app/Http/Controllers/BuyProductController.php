<?php

namespace App\Http\Controllers;

use App\Address;
use App\Customer;
use App\History;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\WishList;
use Illuminate\Support\Facades\DB;

class BuyProductController extends Controller
{
    public function getDetail($pid){

        if(Auth::guard('customer')->id()){
            $productId = $pid;
            $customerId = Auth::guard('customer')->user()->id;
            //Ad vao wishlish
            $foundThisProductInWishList = WishList::where(['product_id'=>$productId,'customer_id'=>$customerId])->get();
            if($foundThisProductInWishList->count()==0){
                $addToWishList = new WishList();
                $addToWishList->customer_id = $customerId;
                $addToWishList->product_id = $productId;
                $addToWishList->save();
            }

            $addressCustomer = Address::where('customer_id',$customerId)->get();
            if($addressCustomer->count()==0){
                //den trang them dia chi
            }

            $feeShipping = mt_rand(30, 80);
            $fullFeeShipping = $feeShipping*1000;

            $foundProduct = Product::find($productId);

            return view('Pages.method-pay')->with(['allAddress'=>$addressCustomer,'fullFeeShipping'=>$fullFeeShipping,
                                                    'product'=>$foundProduct]);
        } else {
            return redirect()->route('home')->withErrors(['Bạn phải đăng nhập trước khi mua hàng!']);
        }
    }

    public function actionBuy(Request $request){
        if(Auth::guard('customer')->id()) {
            //Lay gia tri
            $idBuyer = Auth::guard('customer')->id();
            $buyer = Customer::find($idBuyer);
            $feeShip = $request->shipFee;
            $idProductBuying = $request->productId;
            $idAddressReceiver = $request->addressId;
            $productBuying = Product::find($idProductBuying);
            $seller = Customer::find($productBuying->seller_id);
//            dd($feeShip+$productBuying->price);
            //Nghiep vu
            if($buyer->wallet < ($feeShip+$productBuying->price)){
                return redirect()->route('topup')->withErrors(['Tài khoản của bạn không đủ, vui lòng nạp tiền rồi mua lại sản phẩm trong wishlist!']);
            }

            //Thuc hien transaction gom cac qua trinh:
            //1. Tru vi nguoi ban
            //2. Tru ship(neu co) và giá trị sp tu nguoi mua
            //3. Ghi history
            //4. Xoa wishlist
            DB::beginTransaction();
            try {
                $seller->wallet_freeze -= $productBuying->price*0.05;
                $seller->save();

                $productBuying->buyer_id = $idBuyer;
                $productBuying->save();

                if($feeShip != -1) {
                    $buyer->wallet -= $feeShip;
                }
                $buyer->wallet -= $productBuying->price;
                $buyer->save();

                $historyTransaction = new History();
                $historyTransaction->product_id = $idProductBuying;
                $historyTransaction->address_id = $idAddressReceiver;
                $historyTransaction->buyer_id = $idBuyer;
                $historyTransaction->ship_fee = $feeShip;
                $historyTransaction->save();

                $foundInWishList = WishList::where(['product_id'=>$idProductBuying,'customer_id'=>$idBuyer]);
                $foundInWishList->delete();

                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                throw new Exception($e->getMessage());
            }

            return redirect()->route('home')->with('message-success', 'Giao dịch thành công, hãy nhớ đánh giá cho người bán nhé!');
        } else {
            return redirect()->route('home')->withErrors(['Bạn phải đăng nhập trước khi mua hàng!']);
        }
    }

}
