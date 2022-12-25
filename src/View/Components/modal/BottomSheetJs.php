<?php

namespace DD4You\Dpanel\View\Components\modal;

use Illuminate\View\Component;

class BottomSheetJs extends Component
{
    public $hideOnClickOutside;
    public function __construct($hideOnClickOutside = 'false')
    {
        $this->hideOnClickOutside = $hideOnClickOutside;
    }


    public function render()
    {
        return view('components.modal.bottom-sheet-js');
    }
}
