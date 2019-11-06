<!-- page wapper-->
<div class="columns-container min-height-800">
    <div class="container wapper-page" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Sản phẩm giao dịch</span>
        </div>
        <!-- ./breadcrumb -->

        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2 text-primary"><strong>SẢN PHẨM ĐÃ GIAO DỊCH</strong></span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content page-contact">
            <div class="box-products fashion">
                    <div class="box-product-head">
                        <div>
                            <ul class="box-tabs nav-tab">
                                <li class="active"><a data-toggle="tab" href="#tab-1">Đã Bán</a></li>
                                <li><a data-toggle="tab" href="#tab-2">Đã Mua</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-produts-content">

                        <div >
                            <div class="tab-container">
                                <div id="tab-1" class="tab-panel active">
                                   <div class="list-product mt-5">
                                       @if(count($selled) == 0)
                                           <div class="text-danger">Chưa bán sản phẩn nào</div>
                                       @else
                                           <div class="row">
                                               <div class="col-sm-12 col-md-10 col-md-offset-1">
                                                   <table class="table table-hover">
                                                       <thead>
                                                       <tr>
                                                           <th><strong>Product</strong></th>
                                                           <th><strong>Tình trạng</strong></th>
                                                           <th class="text-center"><strong>Giá</strong></th>
                                                       </tr>
                                                       </thead>
                                                       <tbody>
                                                       @foreach($selled as $sell)
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
                                                                   </div>
                                                                   <a href="customer-profile/{{$sell->buyer->id}}">
                                                                       Nguời mua: {{$sell->buyer->name}}
                                                                   </a>
                                                                   <div style="color: #6cb2eb">
                                                                       Ngày bán: {{$sell->history->created_at}}
                                                                   </div>
                                                               </div></td>
                                                                    <td style="color: #ff7700"><strong>Đã bán</strong></td>
                                                                <td class="col-sm-1 col-md-1 text-center"style="color: red"><strong>{{$sell->price}}$</strong></td>
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
                                        @if(count($bought) == 0)
                                            <div class="text-danger">Chưa mua sản phẩn nào</div>
                                        @else
                                            <div class="row">
                                                <div class="col-sm-12 col-md-10 col-md-offset-1">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th><strong>Product</strong></th>
                                                            <th><strong>Tình trạng</strong></th>
                                                            <th class="text-center"><strong>Giá</strong></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($bought as $buy)
                                                            <tr>
                                                                <td class="col-sm-7 col-md-6">
                                                                    <div class="media">
                                                                        @if(count($buy->images)>0)
                                                                            <a class="thumbnail pull-left mr-3" href="product-detail/{{$buy->id}}"> <img class="media-object" src="{{$buy->images[0]->image_path}}" style="width: 72px; height: 72px;"> </a>
                                                                        @else
                                                                            <a class="thumbnail pull-left mr-3" href="product-detail/{{$buy->id}}"> <img class="media-object" src="uploads/product_images/no-image.jpg" style="width: 72px; height: 72px;"> </a>
                                                                        @endif
                                                                        <div class="media-body">
                                                                            <h4 class="media-heading"><a href="product-detail/{{$buy->id}}">{{$buy->name}}</a></h4>
                                                                        </div>
                                                                            <a href="customer-profile/{{$buy->seller->id}}">
                                                                                Người bán: {{$buy->seller->name}}
                                                                            </a>
                                                                        <div style="color: #6cb2eb">
                                                                            Ngày mua: {{$buy->history->created_at}}
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                    <td style="color: #2fa360"><strong>Đã mua</strong></td>
                                                                <td class="col-sm-1 col-md-1 text-center"style="color: red"><strong>{{$buy->price}}$</strong></td>
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
