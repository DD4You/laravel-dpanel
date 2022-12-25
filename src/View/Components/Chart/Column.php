<?php

namespace DD4You\Dpanel\View\Components\Chart;

use Illuminate\View\Component;

class Column extends Component
{

    public $chartId;
    public $chartNames;
    public $chartData;

    public $chartTitle;
    public $chartAxisTitleY;
    public $chartTooltip;

    public function __construct($chartId, $chartNames, $chartData, $chartTitle = null, $chartAxisTitleY = null, $chartTooltip = null)
    {
        $this->chartId = $chartId;
        $this->chartNames = $chartNames;
        $this->chartData = $chartData;
        $this->chartTitle = $chartTitle;
        $this->chartAxisTitleY = $chartAxisTitleY;
        $this->chartTooltip = $chartTooltip;
    }


    public function render()
    {
        return view('components.chart.column');
    }
}
