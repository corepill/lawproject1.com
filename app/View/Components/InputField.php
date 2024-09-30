<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputField extends Component
{
    public $type;
    public $for;
    public $title;
    public $item;

    public function __construct($type = 'text', $for, $title, $item = null)
    {
        $this->type = $type;
        $this->for = $for;
        $this->title = $title;
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-field');
    }
}
