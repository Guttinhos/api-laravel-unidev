<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $fillable = [
        'nome',
        'diretor',
        'estudio',
        'ano_de_lancamento',
        'categorie_id'
    ];
}
