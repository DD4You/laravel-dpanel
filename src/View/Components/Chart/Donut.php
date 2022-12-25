<?php

namespace DD4You\Dpanel\View\Components\Chart;

use Illuminate\View\Component;

class Donut extends Component
{
    public $chartId;
    public $chartName;
    public $chartData;

    public $chartTitle;

    public function __construct($chartId, $chartName, $chartData, $chartTitle = null)
    {
        $this->chartId = $chartId;
        $this->chartName = $chartName;
        $this->chartData = $chartData;
        $this->chartTitle = $chartTitle;
    }


    public function render()
    {
        return view('components.chart.donut');
    }
}
