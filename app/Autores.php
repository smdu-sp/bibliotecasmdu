<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autores extends Model
{
    protected $table = 'autores';
    protected $primaryKey = 'IDAutor';

    protected $fillable = [
    	'NomeDoAutor',
    	'AutorPessoal',
    	'Cutter'
    ];
}
