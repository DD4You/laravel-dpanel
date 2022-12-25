<?php

namespace DD4You\Dpanel\View\Components\modal;

use Illuminate\View\Component;

class BottomSheet extends Component
{
    public $sheetId;
    public $title;
    public $bsPosition;

    public function __construct($sheetId, $bsPosition = null, $title = null)
    {
        $this->sheetId = $sheetId;
        $this->bsPosition = $bsPosition;
        $this->title = $title ? $title : 'Bottom Sheet Title';
    }


    public function render()
    {
        return view('components.modal.bottom-sheet');
    }
}
