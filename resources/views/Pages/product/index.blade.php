@extends('Pages.layouts.main')

@section('content')
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Highcharts Example</title>
    <style type="text/css"></style>
</head>
<body>
    <div class="row">
        <div class="col-md-6">
            <div id="charts-revenue" class="charts-style"></div>
        </div>
        <div class="col-md-6">
            <div id="charts-order" class="charts-style"></div>
        </div>
    </div>
</body>
</html>
@endsection

@section('script')
    <script>
        let revenue = '{{ json_encode($revenue) }}';
        let orders = '{{ json_encode($orders) }}';
    </script>
    <script src="{{ asset('js/charts.js') }}"></script>
@endsection
