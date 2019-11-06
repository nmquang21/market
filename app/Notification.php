<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    protected $fillable=['product_id','customer_id','type','content'];

    public function product(){
        return $this->belongsTo('App\Product','product_id','id');
    }
}
