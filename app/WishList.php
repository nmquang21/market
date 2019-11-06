<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $fillable=['customer_id','product_id'];

    public function product(){
        return $this->hasMany('App\Product','product_id','id');
    }
}
