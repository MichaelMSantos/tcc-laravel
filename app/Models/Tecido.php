<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecido extends Model
{
    use HasFactory;

    protected $primaryKey ='id';

    protected $fillable = [
        'codigo',        
        'medida',
        'cor',
        'quantidade',
    ];
}
