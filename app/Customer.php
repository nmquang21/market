<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customer extends Authenticatable

{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password','provider', 'provider_id','avatar','username'
    ];
    public static function addCustomer($input)
    {
        try {

            self::create($input);
            return true;
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return false;
        }
    }
    public function wishList(){
        return $this->belongsToMany('App\Product','App\WishList','customer_id','product_id','id');
    }
    public function rates(){
        return $this->hasMany('App\CustomerRate','customer_id','id');
    }
    public function countStar(){
        $star = CustomerRate::where([['customer_id',$this->id],['active',1]])->avg('star');
        if($star!=0)
            return number_format($star, 1);
        return 0;
    }
    public function watchedProduct(){
        return $this->belongsToMany('App\Product','App\WatchedProduct','customer_id','product_id','id');
    }
    public function starDetail(){
        $starDetail = CustomerRate::where([['customer_id',$this->id],['active',1]])->get();
        $starDetail->total = count($starDetail);
        $starDetail->star_5 =0;
        $starDetail->star_4 =0;
        $starDetail->star_3 =0;
        $starDetail->star_2 =0;
        $starDetail->star_1 =0;
        foreach ($starDetail as $star){
            if($star->star == 5){
                $starDetail->star_5++;
            }
            else if($star->star == 4){
                $starDetail->star_4++;
            }
            else if($star->star == 3){
                $starDetail->star_3++;
            }
            else if($star->star == 2){
                $starDetail->star_2++;
            }
            else if($star->star == 1){
                $starDetail->star_1++;
            }
        }
        return $starDetail;
    }

}
