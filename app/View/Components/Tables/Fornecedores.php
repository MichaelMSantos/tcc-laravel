<?php

namespace App\View\Components\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Fornecedores extends Component
{

    public $fornecedores;
    public function __construct($fornecedores)
    {
        $this->fornecedores = $fornecedores;
    }

    public function render(): View|Closure|string
    {
        return view('components.tables.fornecedores');
    }
}
