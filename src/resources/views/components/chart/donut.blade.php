<script>
    setTimeout(() => {
        Highcharts.chart('{{ $chartId }}', {
            chart: {
                // backgroundColor: '#1f2937',
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: "{{ $chartTitle ?? '' }}",
                // style: {
                //     "color": '#ffffff',
                // }
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: '{{ $chartName }}',
                data: @json($chartData),
            }]
        });
    }, 1000);
</script>
<div id="{{ $chartId }}" class="w-full bg-white rounded-md shadow-lg hover:shadow-xl duration-300"></div>
