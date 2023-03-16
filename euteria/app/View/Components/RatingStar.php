<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RatingStar extends Component
{
    /**
     * Field radio name
     * 
     */
    public $name;
    public $checked;
    // public $default= null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $checked='')
    {
        $this->name = $name;
        // $this->default = $default;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.rating-star');
    }
}
