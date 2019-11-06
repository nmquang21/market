@extends('Pages.layouts.main')
@section('top-menu')
    @include('Pages.layouts.top-menu-homepage')
@endsection

@section('content')
    <!-- page wapper-->
    <div class="columns-container">
        <div class="container wapper-page" id="columns"  style="background-image: url(images/photography.png)">
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="#" title="Return to Home">Home</a>
                <span class="navigation-pipe">&nbsp;</span>
                <span class="navigation_page">Thêm địa chỉ</span>
            </div>
            <!-- ./breadcrumb -->
            <!-- page heading-->
            <h2 class="page-heading">
                <span class="page-heading-title2 text-danger"><strong>Thêm địa chỉ nhận hàng</strong></span>
            </h2>
            <!-- ../page heading-->
            <div class="page-content page-contact" style="width: 600px; margin-right: auto; margin-left: auto; font-size: 20px">
                <form action="save-customer-address" method="POST" onsubmit="return true">
                    @csrf

                    <input name="product_id" value="{{$product_id}}" hidden>
                    <input name="customer_id" id="customer_id" value="{{Auth::guard('customer')->user()->id}}" hidden>
                    <div class="place" style="border: 1px solid #ccc; padding: 30px; border-radius: 5px; box-shadow: 0px 0px 10px 0.5px">
                        <div class="text-center"><strong>Địa Chỉ</strong></div>
                        <div class="form-group mt-5">
                            <label for="province_id">Tỉnh/Thành phố:</label>
                            <select class="form-control" name="province_id" id="province" required>
                                <option value="0">Toàn Quốc</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="district_id">Quận/Huyện:</label>
                            <select class="form-control" name="district_id" id="district" required>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="ward_id">Xã/Phường/Thị trấn:</label>
                            <select class="form-control" name="ward_id" id="ward" required>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="village_id">Thôn/Xóm:</label>
                            <select class="form-control" name="village_id" id="village" required>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="detail">Chi tiết:</label>
                            <textarea name="detail"id="detail" class="form-control" style="height: 150px"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center" style="margin-top: 50px">
                        <button  type="submit" class="btn-success btn"  id="ok" type="submit">Đăng tin</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@section('script')
    <script>
        jQuery(document).ready(function () {
            $('input[type=radio][name=status]').change(function() {
                if(this.value == 0){
                    jQuery('#sale').html(
                        '<label for="sale">Sale(%): </label>' +
                        '<input style="color: red" type="text" class="form-control" name="sale" id="sale" >'
                    )
                }
                else {
                    jQuery('#sale').html('');
                }
            });


            jQuery('#submit').click(()=>{
                console.log(jQuery('#cover').val());
            })
            getAjax = (url,method,data)=>{
                return jQuery.ajax({
                    url:url,
                    method:method,
                    data:data,
                })
            }
            var location={
                province_id:'',
                district_id:'',
                ward_id:'',
                village_id:'',
                detail:'',
                customer_id:''
            };
            getAjax('getProvince','GET').done((result)=>{
                result.forEach((data)=>{
                    jQuery('#provinces').append('<option value="'+data.provinceid+'">'+data.name+'</option>')
                });
            })
            getAjax('list-cate','GET').done((result)=>{
                result.forEach((data)=>{
                    jQuery('#category').append('<option value="'+data.id+'">'+data.name+'</option>')
                });
            })
            jQuery('#category').change(function () {
                jQuery('#category-child').html('');
                jQuery('#category-child').append('<option></option>');
                var category = jQuery(this).val();

                getAjax('category-child','GET',{category:category}).done((result)=>{
                    result.forEach((data)=>{
                        jQuery('#category-child').append('<option value="'+data.id+'">'+data.name+'</option>')
                    });
                })
            })
            jQuery('#provinces').change(function () {
                location.province
                jQuery('#district').html('');
                jQuery('#district').append('<option></option>');
                var province = jQuery(this).val();
                location.province_id = province;
                getAjax('getDistrict','GET',{provinceid:province}).done((result)=>{
                    result.forEach((data)=>{
                        jQuery('#district').append('<option value="'+data.districtid+'">'+data.name+'</option>')
                    });
                })
            })
            jQuery('#district').change(function () {
                jQuery('#ward').html('');
                jQuery('#ward').append('<option></option>');
                var district = jQuery(this).val();
                location.district_id = district;
                getAjax('getWard','GET',{districtid:district}).done((result)=>{
                    result.forEach((data)=>{
                        jQuery('#ward').append('<option value="'+data.wardid+'">'+data.name+'</option>')
                    });
                })
            })
            jQuery('#ward').change(function () {
                jQuery('#village').html('');
                jQuery('#village').append('<option></option>');
                var ward = jQuery(this).val();
                location.ward_id = ward;
                getAjax('getVillage','GET',{wardid:ward}).done((result)=>{
                    result.forEach((data)=>{
                        jQuery('#village').append('<option value="'+data.villageid+'">'+data.name+'</option>')
                    });
                })
            })
            jQuery('#village').change(function () {
                var village = jQuery(this).val();
                location.village_id = village;
            })
            // jQuery('#ok').click(function () {
            //     location.detail = jQuery('#detail').val();
            //     location.customer_id =jQuery('#customer_id').val();
            //     let token = jQuery('input[name=_token]').val();
            //     jQuery.ajax({
            //         url:'add-customer-address',
            //         method:'POST',
            //         data:{'location':location,'_token':token}
            //     }).done((result)=>{
            //         console.log(result)
            //     })
            //
            // })
        })
    </script>
@endsection
@section('css')
    <style>
        label{
            font-size: 20px;
            color: #ba8b00;
        }
        .option_{
            font-size: 15px;
        }
    </style>
@endsection
<!-- ./page wapper-->

@endsection
