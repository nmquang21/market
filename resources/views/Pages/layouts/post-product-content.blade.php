<!-- page wapper-->
<div class="columns-container">
    <div class="container wapper-page" id="columns"  style="background-image: url(images/photography.png)">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Post Product</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2 text-danger"><strong>Đăng tin</strong></span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content page-contact" style="width: 600px; margin-right: auto; margin-left: auto; font-size: 20px">
            <form action="post-product" method="POST" onsubmit="return true">
                @csrf
                <input name="customer_id" value="{{Auth::guard('customer')->user()->id}}" hidden>
                <div class="place" style="border: 1px solid #ccc; padding: 30px; border-radius: 5px; box-shadow: 0px 0px 10px 0.5px">
                    <div class="text-center"><strong>Địa Chỉ</strong></div>
                    <div class="form-group mt-5">
                        <label for="province">Tỉnh/Thành phố:</label>
                        <select class="form-control" name="province" id="province">
                            <option value="0">Toàn Quốc</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="district">Quận/Huyện:</label>
                        <select class="form-control" name="district" id="district">
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="ward">Xã/Phường/Thị trấn:</label>
                        <select class="form-control" name="ward" id="ward">
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="village">Thôn/Xóm:</label>
                        <select class="form-control" name="village" id="village">
                        </select>
                    </div>
                </div>
                <hr>
                <div class="place mt-5" style="border: 1px solid #ccc; padding: 30px; border-radius: 5px; box-shadow: 0px 0px 10px 0.5px">
                    <div class="text-center"><strong>Thông Tin</strong></div>
                    <div class="form-group mt-5">
                        <label for="category">Chọn danh mục: </label>
                        <select type="text" class="form-control" name="category" id="category" required >
                            <option></option>
                        </select>
                    </div>

                    <div class="form-group mt-5" >
                        <label for="category-child">Chọn danh mục: </label>
                        <select type="text" class="form-control" name="category_child" id="category-child" required>
                        </select>
                    </div>
                    <div class="form-group mt-5" >
                        <label class="mb-2">Bạn đăng:</label>
                        <p>
                            <input type="radio" id="sell" name="status" value="0">
                            <label  class="option_" for="sell">Cần bán</label>
                        </p>
                        <p>
                            <input type="radio" id="buy" name="status" value="1">
                            <label class="option_" for="buy">Cần mua</label>
                        </p>
                    </div>
                    <div class="form-group mt-5" >
                        <label for="price">Giá(VND): </label>
                        <input style="color: red" type="text" class="form-control" name="price" id="price" required >
                    </div>
                    <div class="form-group mt-5" id="sale">

                    </div>
                    <div class="form-group mt-5" >
                        <label class="mb-2">Tình trạng:</label>
                        <p>
                            <input type="radio" id="new" name="new" value="0">
                            <label class="option_" for="new">Mới</label>
                        </p>
                        <p>
                            <input type="radio" id="used" name="new" value="1">
                            <label class="option_" for="used">Đã qua sử dụng</label>
                        </p>
                    </div>
                    <div class="form-group mt-5" >
                        <label for="price">Tên: </label>
                        <input style="" type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group mt-5" >
                        <label for="price">Chi tiết: </label>
                        <textarea  type="text" class="form-control ckeditor" name="detail" id="detail" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="myDropzone">Ảnh: </label>
                        <div class="dropzone" id="my-dropzone" name="myDropzone">

                        </div>
                    </div>
                </div>

                <div class="text-center" style="margin-top: 50px">
                    <button  type="submit" class="btn-success btn"  id="submit" type="submit">Đăng tin</button>
                </div>
            </form>

        </div>
    </div>
</div>
@section('script')
    <script>
        jQuery(document).ready(function () {
            // $('input[type=radio][name=status]').change(function() {
            //     if(this.value == 0){
            //         jQuery('#sale').html(
            //             '<label for="sale">Sale(%): </label>' +
            //             '<input style="color: red" type="text" class="form-control" name="sale" id="sale" >'
            //         )
            //     }
            //     else {
            //         jQuery('#sale').html('');
            //     }
            // });


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
                province:'',
                district:'',
                ward:'',
                village:''
            };
            getAjax('getProvince','GET').done((result)=>{
                result.forEach((data)=>{
                    jQuery('#province').append('<option value="'+data.provinceid+'">'+data.name+'</option>')
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
            jQuery('#province').change(function () {
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

    {{--    //dropzone--}}
    <link rel="stylesheet" href="{{ asset('dropzone/dist/dropzone.css') }}">
    <script src="{{ asset('dropzone/dist/dropzone.js') }}"></script>
    <script type="text/javascript">
        Dropzone.options.myDropzone= {
            url: '{{ url('/uploadImg') }}',
            headers: {
                'X-CSRF-TOKEN': '{!! csrf_token() !!}'
            },
            autoProcessQueue: true,
            uploadMultiple: true,
            parallelUploads: 5,
            maxFiles: 10,
            maxFilesize: 5,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            dictFileTooBig: 'Image is bigger than 5MB',
            addRemoveLinks: true,
            removedfile: function(file) {
                var name = file.name;
                name =name.replace(/\s+/g, '-').toLowerCase();    /*only spaces*/
                $.ajax({
                    type: 'POST',
                    url: '{{ url('/deleteImg') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                    },
                    data: "id="+name,
                    dataType: 'html',
                    success: function(data) {
                        console.log(data)
                        $("#msg").html(data);
                    }
                });
                var _ref;
                if (file.previewElement) {
                    if ((_ref = file.previewElement) != null) {
                        _ref.parentNode.removeChild(file.previewElement);
                    }
                }
                return this._updateMaxFilesReachedClass();
            },
            previewsContainer: null,
            hiddenInputContainer: "body",
        }
    </script>
    <style>
        .dropzone {
            border: 2px dashed #0087F7;
            border-radius: 5px;
            background: white;
        }
    </style>
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
