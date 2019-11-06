<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentProduct extends Model
{
    protected $fillable =['product_id','customer_id','comment'];

    public function customer(){
        return $this->belongsTo('App\Customer','customer_id','id');
    }
}
