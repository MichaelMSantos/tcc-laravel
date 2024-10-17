<?php

namespace Database\Seeders;

use App\Models\Camiseta;
use App\Models\Fornecedor;
use App\Models\User;
use App\Models\Tinta;
use App\Models\Tecido;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'GestTech',
            'email' => 'gesttechsolutions@gmail.com',
            'password' => Hash::make('secret'),
            'cpf' => '123.234.244-54'
        ]);

        Fornecedor::factory()->create([
            'nome' => 'Fornecedor1',
            'telefone' => '11 12345-1234',
            'endereco' => 'Rua ABC',
            'email' => 'fornecedor@teste.com',
            'whatsapp' => '1922393332',
        ]);

        Tinta::factory()->create([
            'codigo' => '123456',
            'marca' => 'teste',
            'cor' => 'Branca',
            'quantidade' => '10',
            'capacidade' => '2L',
            'fornecedor_id' => '1',
        ]);

        Camiseta::factory()->create([
            'codigo' => '12345',
            'modelo' => 'manga longa',
            'tamanho' => 'G',
            'categoria' => 'Jovem',
            'cor' => 'Preto',
            'quantidade' => '30',
            'fornecedor_id' => '1',
        ]);

        Tecido::factory()->create([
            'codigo' => '12346',
            'medida' => '2M',
            'cor' => 'Azul',
            'quantidade' => '10',
            'fornecedor_id' => '1',
        ]);
    }
}
