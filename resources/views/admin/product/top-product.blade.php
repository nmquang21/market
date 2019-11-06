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
                            <a href="#">Top product</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">List</a>
                        </li>
                    </ul>
                </div>
                @csrf
                <div id="deleteModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Do you want to Delete?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="delete" data-dismiss="modal">Delete</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="align-items-center pull">
                                <h4 class="card-title pull-left">List Top Product</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Create At</th>
                                        <th>Update At</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Create At</th>
                                        <th>Update At</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($topProduct as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->customer->name}}</td>
                                            <td>{{$product->name}}</td>
                                            <td><img width="60px" src="{{asset($product->images[0]->image_path)}}"></td>

                                            <th style="color: red">{{$product->price}}đ</th>
                                            <td>{{$product->created_at}}</td>
                                            <td>{{$product->updated_at}}</td>
                                            <td>
                                                <button class="btn btn-danger delete-top" value="{{$product->id}}"data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i>  Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pull-right">{{$topProduct->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.footer')
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
            let id_product=0;
            let token = jQuery('input[name=_token]').val();
            jQuery('.delete-top').click(function () {
                id_product= jQuery(this).val();
            })
            jQuery('#delete').click(function () {
                jQuery.ajax({
                    url:'delete-top',
                    method:"POST",
                    data:{
                        '_token':token,
                        'product_id':id_product
                    }
                }).done(function (result) {
                    location.reload();
                })
            })
        });
    </script>
@endsection
