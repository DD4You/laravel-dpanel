<?php

namespace DD4You\Dpanel\View\Components\sidebar;

use Illuminate\View\Component;

class Item extends Component
{
    public $name;
    public $icon;
    public $url;
    public $isActive;

    public function __construct($name, $icon, $url = null, $isActive = false)
    {
        $this->name = $name;
        $this->icon = $icon;
        $this->url = $url;
        $this->isActive = $isActive;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar.item');
    }
}
