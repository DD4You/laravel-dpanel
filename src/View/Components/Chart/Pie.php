<?php

namespace DD4You\Dpanel\View\Components\Chart;

use Illuminate\View\Component;

class Pie extends Component
{
    public $chartId;
    public $chartName;
    public $chartData;
    public $chartTitle;

    public function __construct($chartId, $chartData, $chartName, $chartTitle)
    {
        $this->chartId = $chartId;
        $this->chartName = $chartName;
        $this->chartTitle = $chartTitle;
        $this->chartData = $chartData;
    }


    public function render()
    {
        return view('components.chart.pie');
    }
}
