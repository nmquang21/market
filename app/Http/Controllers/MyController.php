<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\District;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Product;
use App\Province;
use App\Village;
use App\Ward;
use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MyController extends Controller
{
    var $email;
    public function getProvince(){
        $provinces = Province::OrderBy('name')->get();
        return $provinces;
    }
    public function getDistrict(Request $request){
        $districts = District::where('provinceid',$request->provinceid)->get();
        return $districts;
    }
    public function getWard(Request $request){
        $wards = Ward::where('districtid',$request->districtid)->get();
        return $wards;
    }
    public function getVillage(Request $request){
        $villages = Village::where('wardid',$request->wardid)->get();
        return $villages;
    }

    public function getCate(){
        $cates = Category::where('parent_id',0)->get();
        return $cates;
    }

    public function getCateChild(Request $request){
        $cate_parentId = $request->category;
        $list = Category::where('parent_id',$cate_parentId)->get();
        return $list;
    }

    public function getHomePage(){
        return view('homepage');
    }
    public function getSeachPage(){
        return view('seach');
    }

    public function postRegister(RegisterRequest $request)
    {

        if ($request->isMethod('post')) {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
            $status = false;
            $message = __('message.register_failed');
            if (Customer::addCustomer($input)) {
                $status = true;
                $message = __('message.register_success');
                Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password]);
            }
            return response()->json(['status' => $status, 'message' => $message]);
        }
    }

    public function postLogin(LoginRequest $request)
    {
//        dd($request);

        $customer = Customer::where('email',$request->email)->first();
        if(!$customer){
            return response()->json(['status' => false, 'message' => __('message.does_not_exist')]);
        }
        else if($customer->active == 0){
            return response()->json(['status' => false, 'message' => __('message.block_account')]);
        }
        else{
            if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return response()->json(['status' => true]);
            }
            return response()->json(['status' => false, 'message' => __('message.login_failed')]);
        }
    }
    public function postLoginPage(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/admin/dashboard');
        }
        return redirect('/login')->with('thongbao','Sai tên đăng nhập hoặc mật khẩu');
    }

    public function getLogout()
    {
        Auth::guard('customer')->logout();
        session()->flush();
        return redirect()->route(HOME_PAGE);
    }
    public function getLogoutUser()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function postWishList(Request $request){
        if(Auth::guard('customer')->check()){
            $customer = Auth::guard('customer')->user();
            $wish = WishList::where([['customer_id',$customer->id],['product_id',$request->product_id]])->first();
            if(!$wish){
                $wish = new WishList();
                $wish->customer_id = $customer->id;
                $wish->product_id = $request->product_id;
                $wish->save();

                $product =  Product::find($request->product_id);
                $product->images;
                $product->customer;
                return $product;
            }
            return -1;
        }
        return 0;
    }
    public function postDeleteWishList(Request $request){
        $customer_id = Auth::guard('customer')->user()->id;
        WishList::where([['customer_id',$customer_id],['product_id',$request->product_id]])->delete();
        return 'ok';
    }
    public function testMail(){
        $this->email = 'nmquang21@gmail.com';
        $EMAIL = 'nmquang21@gmail.com';
        $data =['name'=>'QUANG','messages'=>'Đăng kí tài khoản thành công'];
        Mail::send('Email.mail-content',$data,function ($message){
            $message->to($this->email)->subject('Market2nd Feedback!');
        });
        return 'OK';
    }
//    public function testMail(){
//        $data =['name'=>'QUANG','messages'=>'Đăng kí tài khoản thành công'];
//        Mail::send('Email.mail-content',$data,function ($message){
//            $message->to('nmquang21@gmail.com')->subject('Market2nd Feedback!');
//        });
//        return 'OK';
//    }

    public function topup(){
        if(Auth::guard('customer')->id()){
            return view('Pages.charge-money');
        } else {
            return redirect()->route('home');
        }
    }

    public function charge(Request $request){
        $amout = $request->amout;
        if(Auth::guard('customer')->id()){
            $idCustomer = Auth::guard('customer')->id();
            $customer = Customer::find($idCustomer);
            $customer->wallet += $amout;
            $customer->save();
            return redirect()->back()->with('message-success', 'Topup money success!');
        } else {
            return redirect()->route('home');
        }
    }

}
