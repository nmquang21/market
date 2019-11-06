@extends('admin.layouts.index')
@section('css')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    @endsection
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
                            <a href="#">Customer</a>
                        </li>
{{--                        <li class="separator">--}}
{{--                            <i class="flaticon-right-arrow"></i>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#">List Category</a>--}}
{{--                        </li>--}}
{{--                        <li class="separator">--}}
{{--                            <i class="flaticon-right-arrow"></i>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#">Add Category</a>--}}
                    </ul>
                </div>
                @if(session('message-success'))
                    <div class="alert alert-success">{{session('message-success')}}</div>
                @endif
                @csrf
                <div class="modal" id="deleteCustomer">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Modal Heading</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                Do you want to delete?
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" id="delete-customer" class="btn btn-success" data-dismiss="modal">Delete</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">List Customer</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->


                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Name</th>
                                            <th>Avatar</th>
                                            <th>Email</th>
                                            <th>Rate</th>
                                            <th>Status</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customer as $key =>$value)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>
                                                @if($value->avatar)
                                                    <img width="60px" src="{{asset($value->avatar)}}">
                                                    @else
                                                    <img width="60px" src="{{asset('uploads/product_images/no-image.jpg')}}">
                                                    @endif
                                            </td>
                                            <td>{{$value->email}}</td>
                                            <td>
                                                @for($i = 0; $i<round($value->countStar()); $i++)
                                                    <i class="fa fa-star" style="color: #ff7700"></i>
                                                @endfor
                                                @for($i = round($value->countStar()); $i<5; $i++)
                                                        <i class="far fa-star"></i>
                                                @endfor
                                            </td>
                                            <td>
                                                @if($value->active ==1)
                                                    <label class="switch">
                                                        <input type="checkbox" checked  value="{{$value->id}}" class="active" active = '1'>
                                                        <span class="slider round"></span>
                                                    </label>
                                                    @else
                                                    <label class="switch">
                                                        <input type="checkbox"  value="{{$value->id}}" class="active" active ='0'>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-danger delete" title="{{ "Xóa ".$value->name }}" data-toggle="modal" data-target="#deleteCustomer" type="button" data-id="{{ $value->id }}"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <div class="pull-right">{{ $customer->links() }}</div>
                            </div>
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
            let id_customer=0;
            let token = jQuery('input[name=_token]').val();
            jQuery('.delete').click(function () {
                id_customer = jQuery(this).attr('data-id');
            });
            jQuery('#delete-customer').click(function () {
                console.log(token);
                jQuery.ajax({
                    url:'delete-customer',
                    method:'POST',
                    data:{'customer_id':id_customer,'_token':token}
                }).done((result)=>{
                    location.reload();
                })
            })
            jQuery('.active').change(function () {
                let customer_id = jQuery(this).val();
                let active = jQuery(this).attr('active');
                $.ajax({
                    url: "active-customer",
                    method: "POST",
                    data: {
                        'customer_id':customer_id,
                        'active':active
                    },
                    success: function (data) {
                        done((result)=>{
                        location.reload();
                        });
                    }
                });
            })
        })
    </script>

    @endsection




