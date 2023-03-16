<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DataTablesServerSide extends Component
{
    public $tableHeader;
    public $title=null;

    public function __construct($tableHeader,$title=null)
    {
        $this->tableHeader = $tableHeader;
        // $this->title = $title;
    }

    public function render()
    {
        return view('components.data-tables-server-side');
    }
}
