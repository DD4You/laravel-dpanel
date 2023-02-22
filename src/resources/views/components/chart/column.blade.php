<script>
    setTimeout(() => {
        Highcharts
            .chart('{{ $chartId }}', {
                chart: {
                    // backgroundColor: '#1f2937',
                    type: 'column',
                    options3d: {
                        enabled: true,
                        alpha: 10,
                        beta: 15,
                        depth: 50,
                        viewDistance: 25
                    }
                },
                xAxis: {
                    categories: @json($chartNames),
                },
                yAxis: {
                    title: {
                        text: "{{ $chartAxisTitleY ?? '' }}",
                        // style: {
                        //     "color": '#a5a5a5',
                        // }
                    }
                },
                tooltip: {
                    headerFormat: '<b>{point.key} {{ $chartTooltip ?? '' }}</b><br>',
                    pointFormat: '{{ $chartTooltip ?? '' }}: {point.y}'
                },
                title: {
                    text: "{{ $chartTitle ?? '' }}",
                    // style: {
                    //     "color": '#ffffff',
                    // }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    column: {
                        depth: 25
                    }
                },
                series: [{
                    data: @json($chartData),
                    colorByPoint: true
                }]
            });
    }, 1000);
</script>
<div id="{{ $chartId }}" class="w-full bg-white rounded-md shadow-lg hover:shadow-xl duration-300"></div>
