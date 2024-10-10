<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'endereco',
        'email',
        'whatsapp',
    ];

    public function camisetas()
    {
        return $this->hasMany(Camiseta::class);
    }
    public function tecido()
    {
        return $this->hasMany(Tecido::class);
    }
    public function tinta()
    {
        return $this->hasMany(Tinta::class);
    }
}
