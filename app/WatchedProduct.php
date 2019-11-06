<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WatchedProduct extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable =['product_id','customer_id'];

}
