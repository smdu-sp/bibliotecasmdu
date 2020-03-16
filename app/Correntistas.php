<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correntistas extends Model
{
    protected $table = 'correntistas';
    protected $primaryKey = 'IDCorrentista';

    const CREATED_AT = 'DataInclusao';
    const UPDATED_AT = 'DataAtualizacao';

    protected $fillable = [
        'IDTipoDeUsuario',
    	'IDSecretaria',
    	'NomeCorrentista',
    	'Tipo',
    	'Endereco',
    	'ComplementoEndereco',
    	'Bairro',
    	'Cidade',
    	'Estado',
    	'CEP',
    	'Fone',
    	'Fax',
    	'Email',
    	'Site',
    	'RG_IE',
    	'CPF_CNPJ',
    	'Observacao',
    	'DataInclusao',
        'DataAtualizacao',
        'Matricula',
        'Setor',
        'RF',
        'Localizacao'
    ];
}
