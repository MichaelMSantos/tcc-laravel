<?php

namespace App\View\Components\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Entradas extends Component
{
    public $entradas;
    public function __construct($entradas)
    {
        $this->entradas = $entradas;
    }
    
    public function render(): View|Closure|string
    {
        return view('components.tables.entradas');
    }
}
