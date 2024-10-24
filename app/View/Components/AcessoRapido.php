<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AcessoRapido extends Component
{
    public $links;

    public function __construct($links)
    {
        $this->links = $links;
    }

    public function render(): View|Closure|string
    {
        return view('components.ui.acesso-rapido');
    }
}
