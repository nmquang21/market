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
                            <a href="#">Report Customer List</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Report Customer List</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="align-items-center pull">
                                <h4 class="card-title pull-left">Report Customer List</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Customer Report</th>
                                        <th>Product</th>
                                        <th>Content</th>
                                        <th>Active</th>
                                        <th>Create At</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reports as $report)
                                        <tr>
                                            <td>{{$report->id}}</td>
{{--                                            <td>{{$rate->customer->name}}</td>--}}
                                            <td>{{$report->customer->name}}</td>
                                            <td>{{$report->customerReport->name}}</td>
                                            <th>
                                                <a href="{{asset('product-detail/'.$report->product->id)}}">
                                                    <img width="50px" src="{{asset($report->product->images[0]->image_path)}}">
                                                    {{$report->product->name}}
                                                </a>
                                            </th>
                                            <td>{{$report->content}}</td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-button" value="{{$report->id}}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>{{$report->created_at}}</td>
                                            <td><button class="btn btn-danger delete-report" value="{{$report->id}}" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i>  Delete</button></td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pull-right">{{ $reports->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade "id="deleteModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Do you want to Delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="accept-delete">Delete</button>
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
                "paging": false,
                "aaSorting": []
            });
            let report_id = 0;
            let token = jQuery('input[name=_token]').val();
            jQuery('.switch-button').change(function () {
                report_id = jQuery(this).val();
                jQuery.ajax({
                    url:'active-report',
                    method:'POST',
                    data:{
                        '_token':token,
                        'report_id':report_id
                    }
                }).done((result)=>{
                    location.reload();
                    console.log(result)
                })
            })
            jQuery('.delete-report').click(function () {
                report_id = jQuery(this).val();
            })
            jQuery('#accept-delete').click(function () {
                jQuery.ajax({
                    url:'delete-report',
                    method:'POST',
                    data:{
                        '_token':token,
                        'report_id':report_id
                    }
                }).done((result)=>{
                    location.reload();
                })
            })
        });
    </script>
@endsection
