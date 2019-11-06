@if(session('message-success'))
    <div class="alert alert-success container pl-5" id="msg"><i class="fas fa-bullhorn"></i>&nbsp;&nbsp;{{session('message-success')}}</div>
@endif
@if($errors->any())
<div class="alert alert-danger container" style="background-color: coral">{{$errors->first()}}</div>
@endif
<div class="nav-top-menu" >
    <div class="container">
        <div class="row">
            <div class="col-sm-3" id="box-vertical-megamenus">
                <div class="box-vertical-megamenus">
                    <h4 class="title">
                        <span class="title-menu">Danh mục sản phẩm</span>
                        <span class="btn-open-mobile pull-right" id="open-list-cate"><i class="fa fa-bars"></i></span>
                    </h4>
                    <div class="vertical-menu-content is-home" id="list-cate" style="display: none">
                        <ul class="vertical-menu-list">
                            @if(count($categories)>0)
                            @for($i = 0; $i < 11;$i++)
                                @if(count($categories[$i]->subCategory)!=0)
                                    <li>
                                        <a class="parent" href="category/{{$categories[$i]->id}}"><img class="icon-menu" alt="Funky roots" width="35px" src="images/category_image/{{$categories[$i]->image}}">{{$categories[$i]->name}}</a>
                                        <div class="vertical-dropdown-menu" style="box-shadow: 0px 0px 10px 1px" >
                                            <div class="vertical-groups col-sm-12">
                                                <div class="mega-group">
                                                    <h4 class="mega-group-header"><span>
                                                            <img src="images/category_image/{{$categories[$i]->image}}">&nbsp;&nbsp;{{$categories[$i]->name}}
                                                        </span>
                                                    </h4>
                                                    <ul class="group-link-default">
                                                        @foreach($categories[$i]->subCategory as $subCate)
                                                            <li><a href="category/{{$subCate->id}}">{{$subCate->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="mega-custom-html col-sm-12">
                                                    <a href="#"><img src="assets-home/data/banner-bottom2.jpg" alt="Banner"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li><a href="#"><img class="icon-menu" alt="Funky roots" src="assets/data/14.png">{{$categories[$i]->name}}</a></li>
                                @endif
                            @endfor
                                @for($i = 11; $i <count($categories);$i++)
                                    @if(count($categories[$i]->subCategory)!=0)
                                        <li class="cat-link-orther">
                                            <a class="parent" href="category/{{$categories[$i]->id}}"><img class="icon-menu" alt="Funky roots" width="35px" src="images/category_image/{{$categories[$i]->image}}">{{$categories[$i]->name}}</a>
                                            <div class="vertical-dropdown-menu" style="box-shadow: 0px 0px 10px 1px" >
                                                <div class="vertical-groups col-sm-12">
                                                    <div class="mega-group">
                                                        <h4 class="mega-group-header"><span>
                                                            <img src="images/category_image/{{$categories[$i]->image}}">&nbsp;&nbsp;{{$categories[$i]->name}}
                                                        </span></h4>
                                                        <ul class="group-link-default">
                                                            @foreach($categories[$i]->subCategory as $subCate)
                                                                <li><a href="category/{{$subCate->id}}">{{$subCate->name}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="mega-custom-html col-sm-12">
                                                        {{--                                                <a href="#"><img src="assets-home/data/banner-megamenu.jpg" alt="Banner"></a>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @else
                                        <li class="cat-link-orther">
                                            <a href="category/{{$categories[$i]->id}}">
                                                <img class="icon-menu" alt="Funky roots" style="width: 35px" src="images/category_image/{{$categories[$i]->image}}">
                                                {{$categories[$i]->name}}
                                            </a>
                                        </li>
                                    @endif
                                @endfor
                                @endif
                        </ul>
                        <div class="all-category"><span class="open-cate">Tất cả danh mục</span></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-md-6 col-lg-7 formsearch-option4">
                <form class="form-inline">
                    <div class="form-group form-category">
                        <select class="select-category">
                            <option value="2">Tất cả</option>
                            <option value="1">Cần bán</option>
                            <option value="4">Cần mua</option>
                        </select>
                    </div>
                    <div class="form-group input-serach">
                        <input type="text" class="search-input" autocomplete="off" style="width: 100%" placeholder="Tìm kiếm...">
                    </div>
                    <button type="submit" class="pull-right btn-search"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
                @if(!Auth::guard('customer')->check())
                    <a  href="javascript:void(0)" onclick="openLoginModal();" class="text-center">
                        <button style="background-color: #1269db; width: 100%;height: 40px; color: #fff; border-radius: 2px"><strong>Đăng tin</strong></button>
                    </a>
                @else
                    <a  href="{{'post-product'}}" class="text-center">
                        <button style="background-color: #1269db; width: 100%;height: 40px; color: #fff; border-radius: 2px"><strong style="font-size: 17px">Đăng tin</strong></button>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
