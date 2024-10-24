<?php

namespace App\View\Components\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PoucoEstoque extends Component
{
    public $poucoestoque;

    public function __construct($poucoestoque)
    {
        $this->poucoestoque = $poucoestoque;
    }

    public function render()
    {
        return view('components.tables.pouco-estoque');
    }
}
