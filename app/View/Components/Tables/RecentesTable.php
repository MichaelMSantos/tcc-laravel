<?php

namespace App\View\Components\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RecentesTable extends Component
{
    public $recentes;
    public function __construct($recentes)
    {
        $this->recentes = $recentes;
    }

    public function render(): View|Closure|string
    {
        return view('components.tables.recentes-table');
    }
}
