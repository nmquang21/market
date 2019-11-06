@extends('Pages.layouts.main')
@section('content')
<style>
    .panel.panel-default.text-left{
        margin-top: 20px;
    }

    .each-frame{
        margin-bottom: 30px;
    }

    .border-delivery {
        height: .1875rem;
        width: 100%;
        background-position-x: -1.875rem;
        background-size: 7.25rem .1875rem;
        background-image: repeating-linear-gradient(45deg,#6fa6d6,#6fa6d6 33px,transparent 0,transparent 41px,#f18d9b 0,#f18d9b 74px,transparent 0,transparent 82px);
    }
    table tr{
        border-bottom: 1px solid #c8c8c8;
    }
</style>
@if(session('message-success'))
<div id="msg" class="alert alert-success">{{session('message-success')}}</div>
@endif
<section class="p-2 mt-5">
    <div class="container">
        <div class="row" style="background: #fff">
            <div class="border-delivery"></div>
            <div class="col-sm-12 ">
                    <div class="panel panel-default text-left">
                        <div class="panel-body">
                            <div class="form-group" >
                                <label class="mb-4">Địa chỉ giao hàng:</label>
                                @foreach($allAddress as $a)
                                <p class="mb-2">
                                    <input type="radio" name="address" id="ad_{{$a->id}}" value="{{$a->id}}">
                                    <label class="option_" for="ad_{{$a->id}}">{{isset(App\Village::where('villageid',$a->village_id)->get()->first()->name) ? App\Village::where('villageid',$a->village_id)->get()->first()->name.',' :''}} {{App\Ward::where('wardid',$a->ward_id)->get()->first()->name}} - {{App\District::where('districtid',$a->district_id)->get()->first()->name}} - {{App\Province::where('provinceid',$a->province_id)->get()->first()->name}}</label>
                                </p>
                                @endforeach
                            </div>

                        </div>
                    </div>
                @if(count(\App\Address::where('customer_id',Auth::guard('customer')->user()->id)->get())<5)
                <div style="float: right" class="p-2 pb-4">
{{--                    <a  href="{{'add-customer-address'}}" class="text-center">--}}
                        <form action="add-customer-address" method="Post">
                            @csrf
                            <input name="product_id" value="{{$product->id}}" hidden>
                            <button class="btn btn-success">Thêm địa chỉ</button>
                        </form>
                @endif
{{--                    </a>--}}
                </div>
            </div>
        </div>
    </div>
</section>
<section class="p-2">
    <div class="container">
        <div class="row" style="background: #fff">
            <div class="col-sm-12">
                <div class="panel panel-default text-left">
                    <div class="panel-body">
                        <p class="mb-4">Phương thức mua hàng</p>
                        <p class="mb-2">
                            <input type="radio" name="method-buy" id="themselves" value="-1">
                            <label class="option_" for="themselves">Tự liên hệ với người bán</label>
                        </p>
                        <p class="mb-2">
                            <input checked type="radio" name="method-buy" id="deliver" value="{{$fullFeeShipping}}">
                            <label class="option_" for="deliver">Giao hàng: {{number_format($fullFeeShipping,0)}} vnđ</label>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="p-2">
    <div class="container">
        <div class="row" style="background: #fff">
            <div class="col-sm-12">
                <div class="panel panel-default text-left">
                    <div class="panel-body">
                        <table class="col-xs-12">
                            <thead>
                            <tr>
                                <th class="col-sm-4">Thông tin sản phẩm</th>
                                <th class="col-sm-4">Ảnh</th>
                                <th class="col-sm-4">Giá tiền</th>
                            </tr>
                            </thead>
                            <tbody class="cart_product">
                            <tr>
                                <th class="col-sm-4">{{$product->name}}</th>
                                <th class="col-sm-4" ><img  src="{{$product->images()->first()->image_path}}" style="height: 100px;width:auto;"></th>
                                <th class="col-sm-4" id="price">{{number_format($product->price,0)}}</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="p-2 mb-5">
    <div class="container">
        <div class="row" style="background: #fff">
            <div class="col-sm-12">
                <div class="panel panel-default text-left">
                    <div class="panel-body">
                        <table class="col-xs-12 mt-2 mb-4">
                            <thead>
                            <tr>
                                <th class="col-sm-2"><strong>Tổng tiền<strong></th>
                                <th class="col-sm-4" id="total"></th>
                            </tr>
                            </thead>
                        </table>
                        <form action="{{route('actionbuy')}}" method="post">
                            @csrf
                            <input type="hidden" id="_productId" name="productId">
                            <input type="hidden" id="_shipFee" name="shipFee">
                            <input type="hidden" id="_addressId" name="addressId">
                            <input type="submit" id="action-buy" name="action-buy" class="btn btn-primary" value="Mua hàng">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@section('script')
    <script>
        $(document).ready(function () {
            var url = window.location.href;
            var productId = url.split('/')[url.split('/').length-1];
            //CHecked address
            $("input:radio[name=address]:first").attr('checked', true);
            //Lay phi ship va gia sp
            var valShip = Number($('#deliver').val());
            var valProduct =  Number($('#price').html().replace(/[^0-9.-]+/g,""));

            $('#_shipFee').val($('input[type=radio][name=method-buy]:checked').val()) ;
            $('#_addressId').val($("input:radio[name=address]:checked").val());
            $('#_productId').val(productId);

            function total(a,b) {
                return a+b;
            }
            //Set gia tri cho tong don hang
            $('#total').html(
                '<strong>'+total(valShip,valProduct).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' vnđ<strong>'
            );
            //Thay doi check radio thi thay doi don hang
            $('input[type=radio][name=method-buy]').change(function() {
                if(this.value == -1){
                    var freeShip =0;
                    $('#total').html(
                        '<strong>'+total(freeShip,valProduct).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' vnđ<strong>'
                    );
                    $('#_shipFee').val(this.value);
                } else {
                    $('#total').html(
                        '<strong>'+total(valShip,valProduct).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' vnđ<strong>'
                    );
                    $('#_shipFee').val(this.value);
                }
            });

            $('input[type=radio][name=address]').change(function() {
                $('#_addressId').val($("input:radio[name=address]:checked").val());
            });
        })

    </script>
    @endsection
