<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprestimos extends Model
{
    protected $table = 'emprestimos';
    protected $primaryKey = 'IDEmprestimos';

    const CREATED_AT = 'DataEmprestimo';
    const UPDATED_AT = 'DataDevolucao';

    protected $fillable = [
        'IDEmprestimo',
        'IDCorrentista',
        'IDAcervo',
        'IDPedido',
        'DataEmprestimo',
        'DataDevolucaoPrevista',
        'DataDevolucao',
        'EXEMPLAR',
        'OBSERVACAO'
    ];
}