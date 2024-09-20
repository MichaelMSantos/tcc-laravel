<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use App\Models\User;
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
            'cpf'=> '123.234.244-54'
        ]);

       Fornecedor::factory()->create([
        'nome'=> 'Fornecedor1',
        'telefone'=>'11 12345-1234',
        'endereco'=>'Rua ABC',
        'email' => 'fornecedor@teste.com',
        'instagram' => 'www.instagram.com',
        'linkedin' => 'br.linkedin.com/',
        'facebook' => 'facebook.com',
       ]);
    }
}
