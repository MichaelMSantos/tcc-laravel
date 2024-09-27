<?php

namespace App\Observers;

use App\Models\Tinta;
use App\Models\Historico;

class TintaObserver
{
    /**
     * Handle the Tinta "created" event.
     */
    public function created(Tinta $tinta): void
    {
        Historico::create([
            'historicoable_id' => $tinta->id,
            'historicoable_type' => Tinta::class,
            'quantidade'=>$tinta->quantidade,
            'descricao' => "Entrada",
        ]);
    }

    /**
     * Handle the Tinta "updated" event.
     */
    public function updated(Tinta $tinta): void
    {
        //
    }

    /**
     * Handle the Tinta "deleted" event.
     */
    public function deleted(Tinta $tinta): void
    {
        //
    }

    /**
     * Handle the Tinta "restored" event.
     */
    public function restored(Tinta $tinta): void
    {
        //
    }

    /**
     * Handle the Tinta "force deleted" event.
     */
    public function forceDeleted(Tinta $tinta): void
    {
        //
    }
}
