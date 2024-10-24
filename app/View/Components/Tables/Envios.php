<?php

namespace App\View\Components\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Envios extends Component
{
    public $enviados;
    public function __construct($enviados)
    {
        $this->enviados = $enviados;
    }

    public function render(): View|Closure|string
    {
        return view('components.tables.envios');
    }
}
