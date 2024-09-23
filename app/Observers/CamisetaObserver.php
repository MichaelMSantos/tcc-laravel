<?php

namespace App\Observers;

use App\Models\Camiseta;
use App\Models\Historico;

class CamisetaObserver
{
    /**
     * Handle the Camiseta "created" event.
     */
    public function created(Camiseta $camiseta): void
    {
        Historico::create([
            'historicoable_id' => $camiseta->id,
            'historicoable_type' => Camiseta::class,
            'descricao' => "Entrada",
        ]);
    }

    /**
     * Handle the Camiseta "updated" event.
     */
    public function updated(Camiseta $camiseta): void
    {
        //
    }

    /**
     * Handle the Camiseta "deleted" event.
     */
    public function deleted(Camiseta $camiseta): void
    {
        //
    }

    /**
     * Handle the Camiseta "restored" event.
     */
    public function restored(Camiseta $camiseta): void
    {
        //
    }

    /**
     * Handle the Camiseta "force deleted" event.
     */
    public function forceDeleted(Camiseta $camiseta): void
    {
        //
    }
}
