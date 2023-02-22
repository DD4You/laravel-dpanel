<?php

namespace DD4You\Dpanel\View\Components;

use Illuminate\View\Component;

class InputErrorMsg extends Component
{

    public function __construct()
    {
        //
    }


    public function render()
    {
        return view('components.input-error-msg');
    }
}
