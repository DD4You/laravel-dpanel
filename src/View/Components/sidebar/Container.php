<?php

namespace DD4You\Dpanel\View\Components\sidebar;

use Illuminate\View\Component;

class Container extends Component
{
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar.container');
    }
}
