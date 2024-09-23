<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tinta extends Model
{
    use HasFactory;

    protected $table = 'tintas';
    protected $primaryKey ='id';

    protected $fillable = [
        'codigo',        
        'marca',
        'cor',
        'quantidade',
        'capacidade',
    ];
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}
