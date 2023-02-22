<script>
    setTimeout(() => {
        Highcharts.chart('{{ $chartId }}', {
            chart: {
                // backgroundColor: '#1f2937',
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: "{{ $chartTitle ?? '' }}",
                // style: {
                //     "color": '#ffffff',
                // }
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: "{{ $chartName ?? '' }}",
                data: @json($chartData)
            }]
        });
    }, 1000);
</script>
<div id="{{ $chartId }}" class="w-full bg-white rounded-md shadow-lg hover:shadow-xl duration-300"></div>
