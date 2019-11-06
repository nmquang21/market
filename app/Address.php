<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable =['product_id','province_id','district_id','ward_id','village_id','customer_id','detail'];
    public function province(){
        $province = Province::where('provinceid',$this->province_id)->get();
        return $province[0]->name;
    }
    public function district(){
        $district = District::where('districtid',$this->district_id)->get();
        if(count($district)>0)
        return $district[0]->name;
    }
    public function ward(){
        $ward = Ward::where('wardid',$this->ward_id)->get();
        if(count($ward)>0)
        return $ward[0]->name;
    }
    public function village(){
        $village = Village::where('villageid',$this->village_id)->get();
        if(count($village)>0)
        return $village[0]->name;
    }
}
