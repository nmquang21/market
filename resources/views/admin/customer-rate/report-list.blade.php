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
                                        <th>Create At</th>
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
                                            <td>{{$report->created_at}}</td></tr>
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
        });
    </script>
@endsection
