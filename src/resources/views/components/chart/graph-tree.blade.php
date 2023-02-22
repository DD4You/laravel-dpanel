<script>
    let tData = @json($chartData);
    let data = [];
    tData.forEach((element, index) => {
        for (const [key, value] of Object.entries(element)) {
            data.push([key, value]);
        }
    });
    let chartRootItem = '{{ $chartRootItem }}';

    setTimeout(() => {
        Highcharts.addEvent(
            Highcharts.Series,
            'afterSetOptions',
            function(e) {
                var colors = Highcharts.getOptions().colors,
                    i = 0,
                    nodes = {};
                if (
                    this instanceof Highcharts.Series.types.networkgraph &&
                    e.options.id === 'lang-tree'
                ) {
                    e.options.data.forEach(function(link) {

                        if (link[0] === chartRootItem) {
                            nodes[chartRootItem] = {
                                id: chartRootItem,
                                marker: {
                                    radius: 20
                                }
                            };
                            nodes[link[1]] = {
                                id: link[1],
                                marker: {
                                    radius: 10
                                },
                                color: colors[i++]
                            };
                        } else if (nodes[link[0]] && nodes[link[0]].color) {
                            nodes[link[1]] = {
                                id: link[1],
                                color: nodes[link[0]].color
                            };
                        }
                    });

                    e.options.nodes = Object.keys(nodes).map(function(id) {
                        return nodes[id];
                    });
                }
            }
        );

        Highcharts.chart('{{ $chartId }}', {
            chart: {
                // backgroundColor: '#1f2937',
                type: 'networkgraph',
                height: '100%'
            },
            title: {
                text: "{{ $chartTitle ?? '' }}",
                // style: {
                //     "color": '#ffffff',
                // }
            },
            // subtitle: {
            //     text: 'A Force-Directed Network Graph in Highcharts',
            //     style: {
            //         "color": '#ffffff',
            //     }
            // },
            plotOptions: {
                networkgraph: {
                    keys: ['from', 'to'],
                    layoutAlgorithm: {
                        enableSimulation: true,
                        friction: -0.9
                    }
                }
            },
            series: [{
                accessibility: {
                    enabled: false
                },
                dataLabels: {
                    enabled: true,
                    linkFormat: ''
                },
                id: 'lang-tree',
                data: data
            }]
        });

    }, 1000);
</script>
<div id="{{ $chartId }}" class="w-full bg-white rounded-md shadow-lg hover:shadow-xl duration-300"></div>
