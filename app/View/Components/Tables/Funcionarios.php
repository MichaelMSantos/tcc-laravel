<?php

namespace App\View\Components\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Funcionarios extends Component
{
    public $funcionarios;
    public function __construct($funcionarios)
    {
        $this->funcionarios = $funcionarios;
    }

    public function render(): View|Closure|string
    {
        return view('components.tables.funcionarios');
    }
}
