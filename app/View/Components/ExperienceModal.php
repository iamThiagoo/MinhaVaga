<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ExperienceModal extends Component
{
    /**
     * Create a new component instance.
     */

    public $method;
    public $route;
    public $title;

    public function __construct($method, $route)
    {
        $this->method = $method;
        $this->route = strtoupper($route);

        $this->title = $this->route = "post" ? "Adicionar experiência" : "Editar experiência";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.experience-modal');
    }
}
