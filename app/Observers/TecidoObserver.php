<?php

namespace App\Observers;

use App\Models\Tecido;
use App\Models\Historico;

class TecidoObserver
{
    /**
     * Handle the Tecido "created" event.
     */
    public function created(Tecido $tecido): void
    {
        Historico::create([
            'historicoable_id' => $tecido->id,
            'historicoable_type' => Tecido::class,
            'descricao' => "Entrada",
        ]);
    }

    /**
     * Handle the Tecido "updated" event.
     */
    public function updated(Tecido $tecido): void
    {
        //
    }

    /**
     * Handle the Tecido "deleted" event.
     */
    public function deleted(Tecido $tecido): void
    {

        
    }

    /**
     * Handle the Tecido "restored" event.
     */
    public function restored(Tecido $tecido): void
    {
        //
    }

    /**
     * Handle the Tecido "force deleted" event.
     */
    public function forceDeleted(Tecido $tecido): void
    {
        //
    }
}
