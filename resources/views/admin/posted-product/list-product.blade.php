@extends('admin.layouts.index')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Post Product</a>
                        </li>

                    </ul>
                </div>
                {{--                @if(session('message-success'))--}}
                {{--                    <div class="alert alert-success">{{session('message-success')}}</div>--}}
                {{--                @endif--}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Post Product</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="table-responsive mb-5 border-bottom-1">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>New</th>
                                        <th>Status</th>
                                        <th>Create At</th>
                                        <th>Update At</th>
                                    </tr>
                                    </thead>
                                    <tbody id="product">
                                    @foreach($product as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->customerName->name}}</td>
                                            <td>{{$post->name}}</td>
                                            @if(count($post->images)>0)
                                                <td>
                                                    <img width="60px" src="{{asset($post->images[0]->image_path)}}">
                                                </td>
                                            @else
                                                <td>
                                                    <img width="60px" src="{{asset('uploads/product_images/no-image.jpg')}}">
                                                </td>
                                            @endif
                                            {{--                                            <td>{{$post->detail}}</td>--}}
                                            <td>{{$post->price}}</td>
                                            @if($post->new == 0)
                                                <td>Mới</td>
                                            @else
                                                <td>Cũ</td>
                                            @endif
                                            @if($post->new == 0)
                                                <td>Cần bán</td>
                                            @else
                                                <td>Cần mua</td>
                                            @endif
                                            <td>{{$post->created_at}}</td>
                                            <td>{{$post->updated_at}}</td>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pull-right">{{$product->links() }}</div>
                                <br/>
                                <div id="result"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script >
        $(document).ready(function() {
            $('#basic-datatables').DataTable({
            });

            $('#multi-filter-select').DataTable( {
                "pageLength": 5,
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );

                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                }
            });

            // Add Row
            $('#add-row').DataTable({
                "paging": false
            });
        });
    </script>
@endsection
