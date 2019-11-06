@extends('admin.layouts.index')
@section('content')
    <style ref="">
        td .avatar-img {
            width: auto;
            height: 80px;
            -o-object-fit: cover;
            /* text-align: center; */
            object-fit: cover;
            border-radius: 0 !important;
            border: none;
            margin: 5px;
        }
    </style>
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
                            <a href="#">Rate Customer</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Active Rate</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="align-items-center pull">
                                <h4 class="card-title pull-left">Active Customer Rate</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Star</th>
                                        <th>Comment</th>
                                        <th>Customer Rate</th>
                                        <th>Create At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($rates as $rate)
                                        <tr>
                                            <td>{{$rate->id}}</td>
                                            <td>{{$rate->customer->name}}</td>
                                            <td>{{$rate->star}}</td>
                                            <td>{{$rate->comment}}</td>
                                            <td>{{$rate->customerRate->name}}</td>
                                            <td>{{$rate->created_at}}</td>
                                            <td>
                                                <input type="checkbox" class="get_value"
                                                       value="{{$rate->id}}"
                                                       product_id="{{$rate->id}}"
                                                       id="checkboxrequire">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <button style="float: right" type="button" name="submit" class="btn btn-info mt-4" id="submit">Submit</button>
                                <br/>
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
        });
    </script>
    <script>
        $('#submit').click(function () {
            var checked =[];
            $('.get_value').each(function () {
                if ($(this).is(":checked")){
                    checked.push($(this).val());
                }
            });
            //checked = checked.toString();
            console.log(checked)

            $.ajax({
                url: "active-rate-customer",
                method: "POST",
                data: {checked : checked},
                success: function (data) {
                    if(data == "success") {
                        location.reload();
                    }

                }
            });
        });
    </script>
@endsection
