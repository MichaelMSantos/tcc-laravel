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
            'name' => 'Mike',
            'email' => 'test@example.com',
            'password' => Hash::make('secret'),
            'cpf' => '123.234.244-54'
        ]);

        Fornecedor::factory()->create([
            'nome' => 'Fornecedor1',
            'telefone' => '11 12345-1234',
            'endereco' => 'Rua ABC',
            'email' => 'fornecedor@teste.com',
            'instagram' => 'www.instagram.com',
            'linkedin' => 'br.linkedin.com/',
            'facebook' => 'facebook.com',
        ]);

        Tinta::factory()->create([
            'codigo' => '123456',
            'marca' => 'teste',
            'cor' => 'Branca',
            'quantidade' => '10',
            'capacidade' => '2L',
        ]);

        Camiseta::factory()->create([
            'codigo' => '12345',
            'modelo' => 'manga longa',
            'tamanho' => 'G',
            'cor' => 'Preto',
            'quantidade' => '30',

        ]);

        Tecido::factory()->create([
            'codigo' => '12346',
            'medida' => '2M',
            'cor' => 'Azul',
            'quantidade' => '10',
        ]);
    }
}
