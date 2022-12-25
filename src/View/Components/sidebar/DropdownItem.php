<?php

namespace DD4You\Dpanel\View\Components\sidebar;

use Illuminate\View\Component;

class DropdownItem extends Component
{
    public $name;
    public $url;
    public $isActive;

    public function __construct($name, $url = null, $isActive = null)
    {
        $this->name = $name;
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
        return view('components.sidebar.dropdown-item');
    }
}
