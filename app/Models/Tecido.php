<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecido extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'tecidos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'codigo',
        'medida',
        'cor',
        'quantidade',

    ];
}

