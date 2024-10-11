<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;

    protected $fillable = ['produto_id', 'produto_type', 'quantidade', 'destinatario'];

    public function produto() {
        return $this->morphTo();
    }
}
