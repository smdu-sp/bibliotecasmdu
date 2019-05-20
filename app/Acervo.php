<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acervo extends Model
{
    protected $table = 'acervo';
    protected $primaryKey = 'IDAcervo';

    const CREATED_AT = 'DataDeCriacao';
    const UPDATED_AT = 'DataDaUltimaAtualizacao';

    protected $fillable = [
        'IDTipoDeObra',
    	'NumeroDeChamada',
    	'Titulo',
    	'SubTitulo',
    	'Notas',
    	'NotasComplementares',
    	'Resumo',
    	'Copias',
    	'DatadeCriacao',
    	'DataDaUltimaAtualizacao',
    	'DataDaUltimaIndexacao',
    	'Tombo',
    	'PermiteExibir',
    	'EnderecoLocal',
    	'EnderecoWeb',
    	'ARQUIVOTIPO',
    	'ARQUIVOTAMANHO',
    	'ARQUIVONOME',
    	'ARQUIVO'
    ];
}
