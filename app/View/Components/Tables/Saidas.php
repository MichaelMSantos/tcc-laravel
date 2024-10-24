<?php

namespace App\View\Components\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Saidas extends Component
{
    public $saidas;
    public function __construct($saidas)
    {
        $this->saidas = $saidas;
    }

    public function render(): View|Closure|string
    {
        return view('components.tables.saidas');
    }
}
