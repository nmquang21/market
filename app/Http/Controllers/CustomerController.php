<?php

namespace App\Http\Controllers;

use App\Address;
use App\Customer;
use App\CustomerRate;
use App\ReportCustomer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function addCustomerAddress(Request $request){
        return view('Pages.addCustomerAddress')->with('product_id',$request->product_id);
    }
    public function saveCustomerAddress(Request $request){
        $customerAddress = new Address($request->all());
        $customerAddress->save();
        return redirect('confirm-buy/'.$request->product_id);

    }
    public function rateCustomer(){
        $rates = CustomerRate::where('active',0)->get();
        return view('admin.customer-rate.active-rate')->with('rates',$rates);
    }
    public function rateCustomerActived(){
        $rates = CustomerRate::where('active',1)->get();
        return view('admin.customer-rate.list-rate')->with('rates',$rates);
    }
    public function activeRateCustomer(Request $request){
        $checked = $request->checked;
        foreach($checked as $ck) {
            $rate = CustomerRate::find($ck);
            $rate->active = 1;
            $rate->save();
        }
        return "success";
    }
    public function reportCustomer(Request $request){
        $report = ReportCustomer::where([['customer_report_id',$request->customer_report_id],
            ['customer_id',$request->customer_id],
            ['product_id',$request->product_id]])->first();
        if(!$report){
            ReportCustomer::create($request->all());
            return 'success';
        }
        return '0';
    }
    public function reportList(){
        $reports = ReportCustomer::where('active',1)->orderBy('created_at','DESC')->paginate(10);
        return view('admin.customer-rate.report-list')->with('reports',$reports);
    }
    public function reportListActive(){
        $reports = ReportCustomer::where('active',0)->orderBy('created_at','DESC')->paginate(10);
        return view('admin.customer-rate.report-active')->with('reports',$reports);
    }
    public function activeReport(Request $request){
        $report = ReportCustomer::find($request->report_id);
        $report->active = 1;
        $report->save();
        //report dc active, cong diem thuong nguoi report,tru diem nguoi bi report;thong bao
        $customer_report_id = $report->customer_report_id;
        $customer_report = Customer::find($customer_report_id);
        $customer_report->wallet = $customer_report->wallet+10000; //thuong 10k
        $customer_report->save();
        Notification::create([
           'product_id'=>$report->product_id,
            'customer_id'=>$customer_report_id,
            'type'=>1,
        ]);
        //tru diem nguoi bi report
        $customer = Customer::find($report->customer_id);
        if($customer->wallet > 20000){
            $customer->wallet = $customer->wallet-20000;//tru 20k
        }
        else{
            $customer->wallet = 0;
        }

        $star = CustomerRate::where([['customer_id',$report->customer_id],['active',1]])->avg('star');
        if($star-1<0){
            $customer->active = 0;
        }
        $customer->save();


        Notification::create([
            'product_id'=>$report->product_id,
            'customer_id'=>$report->customer_id,
            'type'=>3,
        ]);

    }
    public function deleteReport(Request $request){
        $report = ReportCustomer::find($request->report_id);
        //report bi tu choi, tru diem nguoi report, thong bao
        $customer_report_id = $report->customer_report_id;
        $customer_report = Customer::find($customer_report_id);
        $customer_report->wallet = $customer_report->wallet-15000; //tru 15k
        $customer_report->save();
        $report->delete();
        Notification::create([
            'product_id'=>$report->product_id,
            'customer_id'=>$customer_report_id,
            'type'=>2,
        ]);
    }

    //Khánh
    public function index(){
        $customer = Customer::paginate(10);
        return view('admin.customer.list')->with("customer",$customer);
    }

    public function getEdit($id){
        $customer = Customer::find($id);
        return view('Pages.layouts.customer-profile-content',['customer'=>$customer]);
    }

    public function destroy(Request $request){

        $customer = Customer::find($request->customer_id);
        $customer->delete();
        return 'success';
    }
    public function activeCustomer(Request $request){
        $customer_id = $request->customer_id;
        $active = $request->active;
        $customer = Customer::find($customer_id);
        if($active==0){
            $customer->active =1;
            $customer->save();
        }
        else{
            $customer->active =0;
            $customer->save();
        }
        return "success";
    }

}
