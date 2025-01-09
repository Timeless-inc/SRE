<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requerimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'usr_cpf',
        'contato',
        'email',
        'usr_rg',
        'usr_org',
        'campus',
        'num_matricula',
        'curso',
        'periodo',
        'turno',
        'tipo_vinculo',
        'InputRequerimento',
        'obs'
    ];
}
