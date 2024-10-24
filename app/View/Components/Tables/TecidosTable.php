<?php

namespace App\View\Components\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TecidosTable extends Component
{
   public $tecidos;
    public function __construct($tecidos)
    {
        $this->tecidos = $tecidos;
    }

    public function render(): View|Closure|string
    {
        return view('components.tables.tecidos-table');
    }
}
