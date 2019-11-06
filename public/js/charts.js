$(document).ready(function () {
    Highcharts.chart('charts-revenue', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monthly Average Revenue'
        },
        subtitle: {
            text: 'Source: Kuteshop.com'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Revenue (1.000 vnd)',
            },
            labels: {
                formatter: function () {
                    return this.value;
                }
            }
        },
        tooltip: {
            crosshairs: true,
            shared: true
        },
        plotOptions: {
            line: {
                marker: {
                    radius: 4,
                    lineColor: '#666666',
                    lineWidth: 1
                }
            }
        },
        series: [
            {
                name: 'Revenue',
                data: JSON.parse(revenue)
            },
        ]
    });

    Highcharts.chart('charts-order', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Average Orders'
        },
        subtitle: {
            text: 'Source: Kuteshop.com'
        },
        xAxis: {
            type: 'category',
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Quantity',
            },
            labels: {
                formatter: function () {
                    return this.value;
                }
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    // format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
        },

        series: [
            {
                name: "Orders",
                colorByPoint: true,
                data: JSON.parse(orders)
            }
        ],

    });

});
