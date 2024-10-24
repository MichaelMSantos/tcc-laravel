<?php

namespace App\View\Components\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TintasTable extends Component
{
    public $tintas;
    public function __construct($tintas)
    {
        $this->tintas = $tintas;
    }

    public function render(): View|Closure|string
    {
        return view('components.tables.tintas-table');
    }
}
