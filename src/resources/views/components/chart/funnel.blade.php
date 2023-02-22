<script>
    setTimeout(() => {
        Highcharts.chart('{{ $chartId }}', {
            chart: {
                // backgroundColor: '#1f2937',
                type: 'funnel3d',
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
            accessibility: {
                screenReaderSection: {
                    beforeChartFormat: '<{headingTagName}>{chartTitle}</{headingTagName}><div>{typeDescription}</div><div>{chartSubtitle}</div><div>{chartLongdesc}</div>'
                }
            },
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b> ({point.y:,.0f})',
                        allowOverlap: true,
                        y: 10
                    },
                    neckWidth: '30%',
                    neckHeight: '25%',
                    width: '80%',
                    height: '80%'
                }
            },
            series: [{
                name: "{{ $chartName ?? '' }}",
                data: @json($chartData)
            }]
        });
    }, 1000);
</script>
<div id="{{ $chartId }}" class="w-full rounded-md shadow-lg bg-white hover:shadow-xl duration-300"></div>
