<?php

namespace App\View\Components\Card;

use Illuminate\View\Component;

class CardOutline extends Component
{
    public $color; 
    
    public function __construct($color)
    {
        $this->color = $color;
    }
    
    public function render()
    {
        return view('components.card.card-outline');
    }
}
