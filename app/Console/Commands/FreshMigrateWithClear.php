<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan; // Importa o Artisan
use Illuminate\Support\Facades\Storage;

class FreshMigrateWithClear extends Command
{
    // Nome do comando que será usado no Artisan
    protected $signature = 'migrate:fresh-with-clear';

    // Descrição do comando
    protected $description = 'Roda migrate:fresh e limpa a pasta de códigos de barras';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Limpa a pasta de códigos de barras
        if (Storage::disk('public')->exists('barcodes')) {
            // Apaga todos os arquivos da pasta "barcodes"
            Storage::disk('public')->deleteDirectory('barcodes');
            Storage::disk('public')->makeDirectory('barcodes');
            $this->info('A pasta de códigos de barras foi limpa com sucesso.');
        } else {
            $this->info('A pasta "barcodes" não existe.');
        }

        // Executa o migrate:fresh
        Artisan::call('migrate:fresh');
        $this->info('Banco de dados reiniciado com sucesso.');
    }
}
