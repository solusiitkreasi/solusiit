<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PlusButton extends Component
{
    public $route;
    public function __construct($route)
    {
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.plus-button');
    }
}
