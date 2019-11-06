<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerRate extends Model
{
    protected $fillable=['customer_id','star','comment','customer_rate_id','active'];
    public function customerRate(){
        return $this->belongsTo('App\Customer','customer_rate_id','id');
    }
    public function customer(){
        return $this->belongsTo('App\Customer','customer_id','id');
    }
}
