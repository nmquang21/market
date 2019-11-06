<!-- page wapper-->
<div class="columns-container min-height-800">
    <div class="container wapper-page" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Sản phẩm đã đăng</span>
        </div>
        <!-- ./breadcrumb -->
        @csrf
        <div class="modal fade" id="modal_danoibat" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Đã có trong danh sách nổi bật</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="modal_thieutien" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Không đủ tiền trong tài khoản</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-success"  id="naptien" data-dismiss="modal">Nạp tiền</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="modal_noibat" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Đã thêm vào danh sách nổi bật</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                    </div>
                </div>

            </div>
        </div>
        <div id="top-product" class="modal fade" role="dialog">
            <div class="modal-dialog modal-md">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <strong class="modal-title"><h4>Thêm vào tin nổi bật</h4></strong>
                    </div>
                    <div class="modal-body">
                        <h5>Bạn có muốn thêm bài đăng này vào tin nổi bật với giá: <strong style="color: red">149999đ</strong></h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="add-to-top">Thêm</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2 text-primary"><strong>SẢN PHẨM ĐÃ ĐĂNG</strong></span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content page-contact">
            <div class="box-products fashion">
                    <div class="box-product-head">
                        <div>
                            <ul class="box-tabs nav-tab">
                                <li class="active"><a data-toggle="tab" href="#tab-1">Cần Bán</a></li>
                                <li><a data-toggle="tab" href="#tab-2">Cần Mua</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-produts-content">

                        <div >
                            <div class="tab-container">
                                <div id="tab-1" class="tab-panel active">
                                   <div class="list-product mt-5">
                                       @if(count($needSell) == 0)
                                           <div class="text-danger">Không có sản phẩn nào đang bán</div>
                                       @else
                                           <div class="row">
                                               <div class="col-sm-12 col-md-10 col-md-offset-1">
                                                   <table class="table table-hover">
                                                       <thead>
                                                       <tr>
                                                           <th><strong>Product</strong></th>
                                                           <th><strong>Tình trạng</strong></th>
                                                           <th class="text-center"><strong>Giá</strong></th>
                                                           <th><strong>Sửa</strong></th>
                                                           <th><strong>Xóa</strong></th>
                                                           <th><strong>Nổi bật</strong></th>
                                                       </tr>
                                                       </thead>
                                                       <tbody>
                                                       @foreach($needSell as $sell)
                                                            <tr>
                                                           <td class="col-sm-7 col-md-6">
                                                               <div class="media">
                                                                   @if(count($sell->images)>0)
                                                                   <a class="thumbnail pull-left mr-3" href="product-detail/{{$sell->id}}"> <img class="media-object" src="{{$sell->images[0]->image_path}}" style="width: 72px; height: 72px;"> </a>
                                                                   @else
                                                                       <a class="thumbnail pull-left mr-3" href="product-detail/{{$sell->id}}"> <img class="media-object" src="uploads/product_images/no-image.jpg" style="width: 72px; height: 72px;"> </a>
                                                                   @endif
                                                                   <div class="media-body">
                                                                       <h4 class="media-heading"><a href="product-detail/{{$sell->id}}">{{$sell->name}}</a></h4>
                                                                       <span>Trạng thái: </span>
                                                                       <span class="text-success">

                                                                               @if($sell->active == 0)
                                                                               <strong class="text-danger">Chưa xác thực </strong>
                                                                                   @else
                                                                               <strong class="text-success">Đã xác thực </strong>
                                                                           @endif

                                                                       </span>
                                                                       <div>
                                                                           Ngày đăng: {{$sell->created_at}}
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           </td>
                                                                @if($sell->buyer_id == null)
                                                                    <td style="color: #9561e2"><strong>Chưa bán</strong> </td>
                                                                    @else
                                                                    <td style="color: #ff7700"><strong>Đã bán</strong></td>
                                                                @endif
                                                                <td class="col-sm-1 col-md-1 text-center"style="color: red"><strong>{{$sell->price}}$</strong></td>
                                                                @if($sell->buyer_id != null)
                                                                    <td class="col-sm-1 col-md-1">
                                                                        <button type="button" class="btn btn-success" disabled>
                                                                            <span class="glyphicon glyphicon-edit"></span> Sửa
                                                                        </button>
                                                                    </td>
                                                                    <td class="col-sm-1 col-md-1">
                                                                        <button type="button" class="btn btn-danger" disabled>
                                                                            <span class="glyphicon glyphicon-remove"></span> Xóa
                                                                        </button>
                                                                    </td>
                                                                    <td class="col-sm-1 col-md-1">
                                                                        <button type="button" class="btn btn-primary" disabled>
                                                                            <i class="fas fa-bullhorn"></i>Nổi bật
                                                                        </button>
                                                                    </td>
                                                                @else
                                                                    <td class="col-sm-1 col-md-1">
                                                                        <a href="edit-product/{{$sell->id}}">
                                                                            <button type="button" class="btn btn-success">
                                                                                <span class="glyphicon glyphicon-edit"></span> Sửa
                                                                            </button>
                                                                        </a>
                                                                    </td>

                                                                    <td class="col-sm-1 col-md-1">
                                                                        <a href="delete-product/{{$sell->id}}">
                                                                            <button type="button" class="btn btn-danger">
                                                                                <span class="glyphicon glyphicon-remove"></span> Xóa
                                                                            </button>
                                                                        </a>
                                                                    </td>
                                                                    <td class="col-sm-1 col-md-1">
                                                                        <button type="button" class="btn btn-primary noibat" data-toggle="modal" data-target="#top-product" id-product="{{$sell->id}}">
                                                                            <i class="fas fa-bullhorn"></i> Nổi bật
                                                                        </button>
                                                                    </td>
                                                                @endif



                                                       </tr>
                                                       @endforeach
                                                       </tbody>
                                                   </table>
                                               </div>
                                           </div>
                                        @endif
                                   </div>
                                </div>
                                <div id="tab-2" class="tab-panel">
                                    <div class="list-product mt-5">
                                        @if(count($neddBuy) == 0)
                                            <div class="text-danger">Không có sản phẩn nào đang mua</div>
                                        @else
                                            <div class="row">
                                                <div class="col-sm-12 col-md-10 col-md-offset-1">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th><strong>Product</strong></th>
                                                            <th><strong>Tình trạng</strong></th>
                                                            <th class="text-center"><strong>Giá</strong></th>
                                                            <th><strong>Sửa</strong></th>
                                                            <th><strong>Xóa</strong></th>
                                                            <th><strong>Nổi bật</strong></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($neddBuy as $buy)
                                                            <tr>
                                                                <td class="col-sm-7 col-md-6">
                                                                    <div class="media">
                                                                        @if(count($buy->images)>0)
                                                                            <a class="thumbnail pull-left mr-3" href="product-detail/{{$buy->id}}"> <img class="media-object" src="{{$buy->images[0]->image_path}}" style="width: 72px; height: 72px;"> </a>
                                                                        @else
                                                                            <a class="thumbnail pull-left mr-3" href="product-detail/{{$buy->id}}"> <img class="media-object" src="uploads/product_images/no-image.jpg" style="width: 72px; height: 72px;"> </a>
                                                                        @endif                                                                        <div class="media-body">
                                                                            <h4 class="media-heading"><a href="product-detail/{{$buy->id}}">{{$buy->name}}</a></h4>
                                                                            <span>Trạng thái: </span><span class="text-success"></span>
                                                                                <span class="text-success">

                                                                               @if($buy->active == 0)
                                                                                        <strong class="text-danger">Chưa xác thực </strong>
                                                                                    @else
                                                                                        <strong class="text-success">Đã xác thực </strong>
                                                                                    @endif

                                                                                </span>
                                                                                <div>
                                                                                    Ngày đăng: {{$buy->created_at}}
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

{{--                                                                <td class="col-sm-1 col-md-1 text-center" style="color: red"><strong>{{$buy->price}}$</strong></td>--}}

                                                                @if($buy->seller_id == null)
                                                                    <td style="color: #ff7700"><strong>Chưa mua</strong> </td>
                                                                @else
                                                                    <td style="color: #2fa360"><strong>Đã mua</strong></td>
                                                                @endif
                                                                <td class="col-sm-1 col-md-1 text-center"style="color: red"><strong>{{$buy->price}}$</strong></td>
                                                                @if($buy->seller_id != null)
                                                                    <td class="col-sm-1 col-md-1">
                                                                        <button type="button" class="btn btn-success" disabled>
                                                                            <span class="glyphicon glyphicon-edit"></span> Sửa
                                                                        </button>
                                                                    </td>
                                                                    <td class="col-sm-1 col-md-1">
                                                                        <button type="button" class="btn btn-danger" disabled>
                                                                            <span class="glyphicon glyphicon-remove"></span> Xóa
                                                                        </button>
                                                                    </td>
                                                                    <td class="col-sm-1 col-md-1">
                                                                        <button type="button" class="btn btn-primary" disabled>
                                                                            <i class="fas fa-bullhorn"></i>Nổi bật
                                                                        </button>
                                                                    </td>
                                                                @else
                                                                    <td class="col-sm-1 col-md-1">
                                                                        <a href="edit-product/{{$buy->id}}">
                                                                            <button type="button" class="btn btn-success">
                                                                                <span class="glyphicon glyphicon-edit"></span> Sửa
                                                                            </button>
                                                                        </a>
                                                                    </td>

                                                                    <td class="col-sm-1 col-md-1">
                                                                        <a href="delete-product/{{$buy->id}}">
                                                                            <button type="button" class="btn btn-danger">
                                                                                <span class="glyphicon glyphicon-remove"></span> Xóa
                                                                            </button>
                                                                        </a>
                                                                    </td>
                                                                    <td class="col-sm-1 col-md-1">
                                                                        <button type="button" class="btn btn-primary noibat" data-toggle="modal" data-target="#top-product" id-product="{{$buy->id}}">
                                                                            <i class="fas fa-bullhorn"></i> Nổi bật
                                                                        </button>
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@section('script')
    <script>
        jQuery(document).ready(function () {
            let token = jQuery('input[name=_token]').val();
            let idProduct=0;
            jQuery('.noibat').click(function () {
                idProduct = jQuery(this).attr('id-product')
            })
            jQuery('#add-to-top').click(function () {
                jQuery.ajax({
                    url:'add-to-top',
                    method:'POST',
                    data:{
                        '_token':token,
                        'idProduct':idProduct
                    }
                }).done(function (result) {
                    if(result==0){
                        jQuery("#modal_danoibat").modal();
                    }
                    if(result==1){
                        jQuery("#modal_noibat").modal();
                    }
                    else if(result==-1){
                        jQuery("#modal_thieutien").modal();
                    }
                })
            })
            jQuery('#naptien').click(function () {
                window.location="topup";
            })
        })
    </script>
@endsection
