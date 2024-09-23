<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camiseta extends Model
{
    use HasFactory;
    protected $table = 'camisetas';
    protected $primaryKey = 'id';

    protected $fillable = ['codigo', 'modelo', 'tamanho', 'cor', 'quantidade', 'categoria', 'fornecedor_id'];

    public function historicos()
    {
        return $this->morphMany(Historico::class, 'historicoable');
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($camiseta) {
            
            $camiseta->historicos()->delete();
        });
    }
}
