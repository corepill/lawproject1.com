<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Title extends Component
{

    public $heading;
    public $subtext;
    
    /**
     * Create a new component instance.
     */
    public function __construct($heading, $subtext = null)
    {
        $this->heading = $heading;
        $this->subtext = $subtext;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.title');
    }
}
