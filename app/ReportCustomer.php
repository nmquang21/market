<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportCustomer extends Model
{
    protected $fillable=['customer_id','customer_report_id','product_id','content'];
    public function customer(){
        return $this->belongsTo('App\Customer','customer_id','id');
    }
    public function customerReport(){
        return $this->belongsTo('App\Customer','customer_report_id','id');
    }
    public function  product(){
        return $this->belongsTo('App\Product','product_id','id');
    }
}
