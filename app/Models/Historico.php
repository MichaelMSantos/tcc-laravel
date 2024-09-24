<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;
    protected $fillable = ['descricao', 'historicoable_type', 'historicoable_id', 'quantidade', 'created_at'];

    public function historicoable()
    {
        return $this->morphTo();
    }
}
