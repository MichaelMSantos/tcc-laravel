<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecido extends Model
{
    use HasFactory;

    protected $table = 'tecidos';
    protected $primaryKey ='id';

    protected $fillable = [
        'codigo',        
        'medida',
        'cor',
        'quantidade',
    ];

    public function historicos() {
        return $this->morphMany(Historico::class, 'historicoable');
    }
    
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($tecido) {
            
            $tecido->historicos()->delete();
        });
    }
}
