<?php

namespace DD4You\Dpanel\View\Components\Chart;

use Illuminate\View\Component;

class GraphTree extends Component
{
    public $chartId;
    public $chartRootItem;
    public $chartData;
    public $chartTitle;

    public function __construct($chartId, $chartRootItem, $chartData, $chartTitle)
    {
        $this->chartId = $chartId;
        $this->chartTitle = $chartTitle;
        $this->chartRootItem = $chartRootItem;
        $this->chartData = $chartData;
    }


    public function render()
    {
        return view('components.chart.graph-tree');
    }
}
