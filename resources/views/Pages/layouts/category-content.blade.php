@section('title')
    {{$category->name}}
@endsection
<div class="columns-container">
    <div class="container wapper-page" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="homepage" title="Return to Home">Home</a>

            @if($parentCategory!='')
                <span class="navigation-pipe">&nbsp;</span>
                <a href="category/{{$parentCategory->id}}" id="parent-category" value="{{$parentCategory->id}}" class="navigation_page">{{$parentCategory->name}}</a>
            @endif
            <span class="navigation-pipe">&nbsp;</span>
            <a href="category/{{$category->id}}" id="sub-category" value="{{$category->id}}" class="navigation_page">{{$category->name}}</a>

        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <!-- block category -->
                @if(!$parentCategory!='')
                    <div class="block left-module">
                    <p class="title_block">{{$category->name}}</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    @foreach($subCategories as $subCate)
                                        <li><span></span><a href="category/{{$subCate->id}}">{{$subCate->name}} (
                                                {{count($subCate->productActived())}}
                                        )</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                @endif
                <!-- ./block category  -->
                <!-- block filter -->
                @csrf
                <div class="modal fade" id="notificationModal" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Bạn có muốn nhận thông báo khi có bài viết mới về danh mục
                                    <span style="color: red">{{$category->name}}?</span>
                                </h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-success" id="acceptNotification" data-dismiss="modal">Đồng ý</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal fade" id="notificationModal-huy" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Bạn sẽ không nhận được thông báo khi có bài viết mới về danh mục
                                    <span style="color: red">{{$category->name}}?</span>
                                </h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-success" id="acceptNotification-huy" data-dismiss="modal">Đồng ý</button>
                            </div>
                        </div>

                    </div>
                </div>

                @if(Auth::guard('customer')->check() && $parentCategory)
                    <div id="btn-sign-notifi">
                        @if($signNotification==null)
                            <button class="btb btn-primary p-3" style="width: 100%; font-size: 15px" data-toggle="modal" data-target="#notificationModal">Nhận thông báo khi có bài viết mới</button>
                        @else
                            <button class="btb btn-warning p-3" style="width: 100%; font-size: 15px" data-toggle="modal" data-target="#notificationModal-huy">Hủy thông báo khi có bài viết mới</button>
                        @endif
                    </div>
                            <div id="customer" value="{{Auth::guard('customer')->user()->id}}" hidden></div>
                @endif
                <div class="block left-module">

                    <p class="title_block">Lọc </p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-filter-price">

                            <!-- filter price -->
                            <div class="layered_subtitle">Giá</div>
                            <div class="layered-content slider-range">
                                <ul class="check-box-list">
                                    <li>
                                        <input type="radio" id="p1" name="price" class="filter-price" value="p1" />
                                        <label style="color: red" for="p1">Dưới 2 triệu</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="p2" name="price" class="filter-price" value="p2"/>
                                        <label style="color: red" for="p2">Từ 2 - 4 triệu</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="p3" name="price" class="filter-price" value="p3"/>
                                        <label style="color: red" for="p3">Từ 4 - 6 triệu</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="p4" name="price" class="filter-price" value="p4"/>
                                        <label style="color: red" for="p4">Từ 6 - 10 triệu</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="p5" name="price" class="filter-price" value="p5"/>
                                        <label style="color: red" for="p5">Trên 10 triệu</label>
                                    </li>
                                </ul>
                            </div>
                            <!-- ./filter price -->

                            <!-- ./filter brand -->
                            <div class="layered_subtitle">Sản Phẩm</div>
                            <div class="layered-content filter-brand">
                                <ul class="check-box-list" >
                                    <li>
                                        <input type="radio" id="brand1" name="cc" class="filter-cc" value="cc1"/>
                                        <label style="color: #2fa360" for="brand1">Cần mua</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="brand2" name="cc" class="filter-cc" value="cc2"/>
                                        <label style="color: #2fa360" for="brand2">Cần bán</label>
                                    </li>
                                </ul>
                            </div>
                            <!-- ./filter brand -->

                        </div>
                        <!-- ./layered -->

                    </div>
                </div>
                <!-- ./block filter  -->

                <!-- left silide -->
                <div class="col-left-slide left-module">
                    <ul class="owl-carousel owl-style2" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
                        <li><a href="#"><img src="assets-home/data/slide-left.jpg" alt="slide-left"></a></li>
                        <li><a href="#"><img src="assets-home/data/slide-left2.jpg" alt="slide-left"></a></li>
                        <li><a href="#"><img src="assets-home/data/slide-left3.png" alt="slide-left"></a></li>
                    </ul>
                </div>
                <!--./left silde-->
                <!-- TAGS -->
                <div class="block left-module">
                    <p class="title_block">TAGS</p>
                    <div class="block_content">
                        <div class="tags">
                            <a href="#"><span class="level1">actual</span></a>
                            <a href="#"><span class="level2">adorable</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level4">consider</span></a>
                            <a href="#"><span class="level3">phenomenon</span></a>
                            <a href="#"><span class="level4">span</span></a>
                            <a href="#"><span class="level1">spanegs</span></a>
                            <a href="#"><span class="level5">spanegs</span></a>
                            <a href="#"><span class="level1">actual</span></a>
                            <a href="#"><span class="level2">adorable</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level4">consider</span></a>
                            <a href="#"><span class="level2">gives</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level2">gives</span></a>
                            <a href="#"><span class="level1">good</span></a>
                            <a href="#"><span class="level3">phenomenon</span></a>
                            <a href="#"><span class="level4">span</span></a>
                            <a href="#"><span class="level1">spanegs</span></a>
                            <a href="#"><span class="level5">spanegs</span></a>
                        </div>
                    </div>
                </div>
                <!-- ./TAGS -->
                <!-- Testimonials -->
                <div class="block left-module">
                    <p class="title_block">Testimonials</p>
                    <div class="block_content">
                        <ul class="testimonials owl-carousel" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplay="true" data-autoplayHoverPause = "true" data-items="1">
                            <li>
                                <div class="client-mane">Roverto & Maria</div>
                                <div class="client-avarta">
                                    <img src="assets-home/data/testimonial.jpg" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "Your product needs to improve more. To suit the needs and update your image up"
                                </div>
                            </li>
                            <li>
                                <div class="client-mane">Roverto & Maria</div>
                                <div class="client-avarta">
                                    <img src="assets-home/data/testimonial.jpg" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "Your product needs to improve more. To suit the needs and update your image up"
                                </div>
                            </li>
                            <li>
                                <div class="client-mane">Roverto & Maria</div>
                                <div class="client-avarta">
                                    <img src="assets-home/data/testimonial.jpg" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "Your product needs to improve more. To suit the needs and update your image up"
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- ./Testimonials -->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- category-slider -->
{{--                <div class="category-slider">--}}
{{--                    <ul class="owl-carousel owl-style2" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1">--}}
{{--                        <li>--}}
{{--                            <img src="assets-home/data/category-slide.jpg" alt="category-slider">--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <img src="assets-home/data/slide-cart2.jpg" alt="category-slider">--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <!-- ./category-slider -->

                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
                    <h2 class="page-heading">
                        <span class="page-heading-title">{{$category->name}}</span>
                    </h2>
                    <ul class="display-product-option">
                        <li class="view-as-grid selected">
                            <span>grid</span>
                        </li>
                        <li class="view-as-list">
                            <span>list</span>
                        </li>
                    </ul>
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid" id="list-product">
                        @foreach($products as $product)
                            <li class="col-sx-12 col-sm-4" style="height: 450px">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="product-detail/{{$product->id}}">
                                        @if(count($product->images)>0)
                                            <img class="img-responsive" style="height: 270px" alt="product" src="{{$product->images[0]->image_path}}" alt="Product">
                                        @else
                                            <img class="img-responsive" style="height: 270px"   alt="product" src="uploads/product_images/no-image.jpg" alt="Product">
                                        @endif
                                    </a>
                                    <div class="quick-view">
                                        <a title="Add to my wishlist" class="heart wishlist" id-product = "{{$product->id}}"></a>
                                        <a title="Quick view" class="search" href="product-detail/{{$product->id}}"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="#">{{$product->name}}</a></h5>
                                    <div>
                                        Người đăng: <strong>{{$product->customer->name}}</strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<i style="font-size: 15px" class="fas fa-eye mt-1">  {{$product->view->view}}</i>

                                    </div>
                                    <div class="product-rating">
{{--                                        <div style="color: black">{{$product->customer->name}}</div>--}}
                                        @if($product->status == 0)
                                            <button class="btn btn-danger">Cần bán</button>
                                        @else
                                            <button class="btn btn-info">Cần mua</button>
                                        @endif
                                    </div>
                                    <div class="content_price">
                                        @if($product->status == 0)
                                            <span class="price product-price">Giá: {{$product->price}}đ</span>
                                        @else
                                            <span class="price product-price" style="color: #2fa360">Giá: {{$product->price}}đ</span>
                                        @endif
                                    </div>
                                    <div class="info-orther">
                                        <p>Id Product: {{$product->id}}</p>
                                        <div class="product-desc">
                                            {!! $product->detail !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <!-- ./PRODUCT LIST -->
                </div>
                <!-- ./view-product-list-->
                <div class="sortPagiBar">
                    <div class="bottom-pagination">
                        <nav>
                            <ul class="pagination">

{{--                                    @for($i = 1; $i<=(ceil(count($products)/1)); $i++)--}}
{{--                                    <li><a href="#">{{$i}}</a></li>--}}
{{--                                    @endfor--}}

                                {{$products->links()}}
                            </ul>
                        </nav>
                    </div>
                    <div class="show-product-item">
                        <select name="">
                            <option value="">Show 18</option>
                            <option value="">Show 20</option>
                            <option value="">Show 50</option>
                            <option value="">Show 100</option>
                        </select>
                    </div>
                    <div class="sort-product">
                        <select>
                            <option value="">Product Name</option>
                            <option value="">Price</option>
                        </select>
                        <div class="sort-product-icon">
                            <i class="fa fa-sort-alpha-asc"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
@section('script')
    <script>
        jQuery(document).ready(function () {
            let category_info = <?php echo $category?>;
            function product(result){
                let html = '';
                html+='<li class="col-sx-12 col-sm-4">';
                html+='<div class="product-container">';
                html+='<div class="left-block">';
                html+='<a href="product-detail/'+result.id+'">';
                if(result.images.length>0)
                    html+='<img class="img-responsive" style="height: 270px" alt="product" src="'+result.images[0].image_path+'" alt="Product">';
                else
                    html+='<img class="img-responsive" style="height: 270px"  alt="product" src="uploads/product_images/no-image.jpg" alt="Product">';
                html+='</a>';
                html+='<div class="quick-view">';
                html+='<a title="Add to my wishlist" class="heart wishlist" id-product = "'+result.id+'"></a>';
                html+='<a title="Quick view" class="search" href="product-detail/'+result.id+'"></a>';
                html+='</div>';
                html+='<div class="add-to-cart">';
                html+='<a title="Add to Cart" href="#add">Add to Cart</a>';
                html+='</div>';
                html+='</div>';
                html+='<div class="right-block">';
                html+='<h5 class="product-name"><a href="#">'+result.name+'</a></h5>';
                html+='<div>';
                html+='Người đăng: <strong>'+result.customer.name+'</strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<i style="font-size: 15px" class="fas fa-eye mt-1">'+result.view+'</i>';

                html+='</div>';
                html+='<div class="product-rating">';
                html+='   <div style="color: black">'+result.customer.name+'</div>';
                if(result.status == 0)
                    html+='   <button class="btn btn-danger">Cần bán</button>';
                else
                    html+='<button class="btn btn-info">Cần mua</button>';
                html+='</div>';
                html+='<div class="content_price">';
                if(result.status == 0)
                    html+='<span class="price product-price">Giá: '+result.price+'đ</span>';
                else
                    html+='<span class="price product-price" style="color: #2fa360">Giá: '+result.price+'đ</span>';
                html+='</div>';
                html+='<div class="info-orther">';
                html+='<p>Id Product:'+result.id+'</p>';
                html+='<div class="product-desc">';
                html+='</div>';
                html+='</div>';
                html+='</div>';
                html+='</div>';
                html+='</li>';
                return html;
            }
            // let parentCategory = jQuery('#parent-category').attr('value');
            let token = jQuery('input[name=_token]').val();
            let category = jQuery('#sub-category').attr('value');
            let filterPrice ='';
            let filterCC ='';
            jQuery('.filter-price').change(function () {
                filterPrice = jQuery(this).val();
                jQuery.ajax({
                    url:'filter-product',
                    method:'POST',
                    data:{
                        'category':category,
                        'filterPrice':filterPrice,
                        'filterCC':filterCC,
                        '_token':token,
                    }
                }).done((result)=>{
                    if(result.length == 0){
                        jQuery('#list-product').html('<div style="color: red;padding: 50px">Không có sản phẩm nào phù hợp<div>');
                    }
                    else{
                        let html = '';
                        for(let i = 0; i<result.length; i++){
                            html+= product(result[i]);
                        }
                        jQuery('#list-product').html(html);
                    }
                })
            })
            jQuery('.filter-cc').change(function () {
                filterCC = jQuery(this).val();
                jQuery.ajax({
                    url:'filter-product',
                    method:'POST',
                    data:{
                        'category':category,
                        'filterPrice':filterPrice,
                        'filterCC':filterCC,
                        '_token':token,
                    }
                }).done((result)=>{
                    if(result.length == 0){
                        jQuery('#list-product').html('<div style="color: red;padding: 50px">Không có sản phẩm nào phù hợp<div>');
                    }
                    else{
                        let html = '';
                        for(let i = 0; i<result.length; i++){
                            html+= product(result[i]);
                        }
                        jQuery('#list-product').html(html);
                    }
                })
            })
            jQuery('#acceptNotification').click(function () {
                let customer_id = jQuery('#customer').attr('value');
                jQuery.ajax({
                    url:'sign-notification',
                    method:'POST',
                    data:{
                        '_token':token,
                        'customer_id':customer_id,
                        'category_id':category_info.id,
                    }
                }).done((result)=>{
                    jQuery('#btn-sign-notifi').html('<button class="btb btn-warning p-3" style="width: 100%; font-size: 15px" data-toggle="modal" data-target="#notificationModal-huy">Hủy thông báo khi có bài viết mới</button>');

                })
            })
            jQuery('#acceptNotification-huy').click(function () {
                let customer_id = jQuery('#customer').attr('value');
                jQuery.ajax({
                    url:'unsign-notification',
                    method:'POST',
                    data:{
                        '_token':token,
                        'customer_id':customer_id,
                        'category_id':category_info.id,
                    }
                }).done((result)=>{
                    jQuery('#btn-sign-notifi').html('<button class="btb btn-primary p-3" style="width: 100%; font-size: 15px" data-toggle="modal" data-target="#notificationModal">Nhận thông báo khi có bài viết mới</button>');

                })
            })

        })
    </script>
    @endsection
