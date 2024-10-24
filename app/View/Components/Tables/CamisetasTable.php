<?php

namespace App\View\Components\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CamisetasTable extends Component
{

    public $camisetas;
    public function __construct($camisetas)
    {
        $this->camisetas = $camisetas;

    }
    public function render(): View|Closure|string
    {
        return view('components.tables.camisetas-table');
    }
}
