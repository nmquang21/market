@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">Demo</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="province">Tỉnh:</label>
                        <select class="form-control" name="province" id="province">
                            <option></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="district">Huyện:</label>
                        <select class="form-control" name="district" id="district">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ward">Xã:</label>
                        <select class="form-control" name="ward" id="ward">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="village">Thôn:</label>
                        <select class="form-control" name="village" id="village">
                        </select>
                    </div>
                    <div style="float: right">
                        <button class="btn btn-danger" id="ok">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        jQuery(document).ready(function () {
             getAjax = (url,method,data)=>{
                return jQuery.ajax({
                    url:url,
                    method:method,
                    data:data,
                })
            }
            var location={
                 province:'',
                 district:'',
                 ward:'',
                 village:''
             };
            getAjax('getProvince','GET').done((result)=>{
                result.forEach((data)=>{
                    jQuery('#provinces').append('<option value="'+data.provinceid+'">'+data.name+'</option>')
                });
            })

            jQuery('#provinces').change(function () {
                location.province
                jQuery('#district').html('');
                jQuery('#district').append('<option></option>');
                var province = jQuery(this).val();
                location.province = province;
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
                location.district = district;
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
                location.ward = ward;
                getAjax('getVillage','GET',{wardid:ward}).done((result)=>{
                    result.forEach((data)=>{
                        jQuery('#village').append('<option value="'+data.villageid+'">'+data.name+'</option>')
                    });
                })
            })
            jQuery('#village').change(function () {
                var village = jQuery(this).val();
                location.village = village;
            })
            jQuery('#ok').click(function () {

                console.log(location)
            })
        })
    </script>
@endsection
