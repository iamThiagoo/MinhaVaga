<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Logo extends Component
{
    public $class;

    /**
     * Create a new component instance.
     */
    public function __construct($class = null)
    {
        if (empty($class) || !$class) {
            $class = "text-sky-900";
        }

        $this->class = $class;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.logo');
    }
}
