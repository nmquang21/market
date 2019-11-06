@extends('admin.layouts.index')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-inner mt--5">
                <div class="row mt--2">
                    <div class="col-md-6">
                        <div class="card full-height">
                            <div class="card-body">
                                <div class="card-title">Overall statistics</div>
                                <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="circles-1"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Customers</h6>
                                    </div>
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="circles-2"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Sellers</h6>
                                    </div>
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="circles-3"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Buyers</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card full-height">
                            <div class="card-body">
                                <div class="card-title">Monthly Orders</div>
                                <div class="row py-3">
{{--                                    <div class="col-md-3 d-flex flex-column justify-content-around">--}}
{{--                                        <div>--}}
{{--                                            <h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>--}}
{{--                                            <h3 class="fw-bold">$9.782</h3>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <h6 class="fw-bold text-uppercase text-danger op-8">Total Spend</h6>--}}
{{--                                            <h3 class="fw-bold">$1,248</h3>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-md-12">
                                        <div id="chart-container">
                                            <canvas id="totalIncomeChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <div class="card-title">Monthly Revenue</div>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
												<span class="btn-label">
													<i class="fa fa-pencil"></i>
												</span>
                                            Export
                                        </a>
                                        <a href="#" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-print"></i>
												</span>
                                            Print
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="min-height: 375px">
                                    <canvas id="statisticsChart"></canvas>
                                </div>
                                <div id="myChartLegend"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="card-title">Daily Sales</div>
                                <div class="card-category">March 25 - April 02</div>
                            </div>
                            <div class="card-body pb-0">
                                <div class="mb-4 mt-2">
                                    <h1>$4,578.58</h1>
                                </div>
                                <div class="pull-in">
                                    <canvas id="dailySalesChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="h1 fw-bold float-right text-warning">+7%</div>
                                <h2 class="mb-2">213</h2>
                                <p class="text-muted">Transactions</p>
                                <div class="pull-in sparkline-fix">
                                    <div id="lineChart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <footer class="footer">

            <div class="text-center">
                <strong>Copyright ©2019 All rights reserved</strong>
            </div>

        </footer>
    </div>
@endsection

@section('script-charts')
    <script>
        let customers = '{{ json_encode($customers) }}';
        let sellers = '{{ json_encode($sellers) }}';
        let buyers = '{{ json_encode($buyers) }}';
        let revenue = '{{ json_encode($revenue) }}';
        let profits = '{{ json_encode($profits) }}';
        let orders = '{{ json_encode($orders) }}';
    </script>
@endsection
