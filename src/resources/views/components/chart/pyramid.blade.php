<script>
    setTimeout(() => {
        Highcharts.chart('{{ $chartId }}', {
            chart: {
                // backgroundColor: '#1f2937',
                type: 'pyramid3d',
                options3d: {
                    enabled: true,
                    alpha: 10,
                    depth: 50,
                    viewDistance: 50
                }
            },
            title: {
                text: "{{ $chartTitle ?? '' }}",
                // style: {
                //     "color": '#ffffff',
                // }
            },
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b> ({point.y:,.0f})',
                        allowOverlap: true,
                        x: 10,
                        y: -5
                    },
                    width: '60%',
                    height: '80%',
                    center: ['50%', '45%']
                }
            },
            series: [{
                name: "{{ $chartName ?? '' }}",
                data: @json($chartData)
            }]
        });
    }, 1000);
</script>
<div id="{{ $chartId }}" class="w-full bg-white rounded-md shadow-lg hover:shadow-xl duration-300"></div>
