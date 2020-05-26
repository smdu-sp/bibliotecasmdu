<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\BuscaCollection;
use App\Correntistas;
use App\Busca;
use App\Http\Controllers\CorrentistasController;

class BuscaCorrentistasController extends Controller
{
    public function index(){
    	/**
    		Se parâmetros da busca não forem explicitados, apresenta tela de busca
  		**/
  		// TODO: criar frontend com campo de busca e filtros
    }

    public function buscaAssuntos($q) {
    	$idList = DB::table('assuntos')->where('Termo', 'LIKE', '%'.$q.'%')
    	->orWhere('Referencia', 'LIKE', '%'.$q.'%')
        ->join('correntistas', 'emprestimos.IDCorrentista', '=', 'correntistas.IDCorrentista')
    	->select('assuntosdoacervo.IDAcervo')
    	->get();
    	$idArr = array();
    	foreach ($idList as $key => $value) {
    		foreach ($value as $i => $v) {
    			array_push($idArr, $v);
    		}
    	}
    	return $idArr;
    }

    public function buscaAutores($q) {
    	$idList = DB::table('correntistas')->where('NomeDoCorrentista', 'LIKE', '%'.$q.'%')
        ->join('correntistas', 'emprestimos.IDCorrentista', '=', 'correntistas.IDCorrentista')
    	->select('autoresdoacervo.IDAcervo')
    	->get();
    	$idArr = array();
    	foreach ($idList as $key => $value) {
    		foreach ($value as $i => $v) {
    			array_push($idArr, $v);
    		}
    	}
    	return $idArr;
    }

    public function pag($q, $tipo = ''){
    	$data = false;
    	
    	if (!$tipo) {
    		$data = Correntistas::where('NomeCorrentista', 'LIKE', '%'.$q.'%')
    										->orWhere('RF', 'LIKE', '%'.$q.'%')
    										->orWhere('Email', 'LIKE', '%'.$q.'%')
    										->orWhereIn('IDCorrentista', $this->buscaCorrentistas($q))
    										->orWhereIn('IDCorrentista', $this->buscaRF($q))
    										->paginate(10);
			}
			else if ($tipo === 'NomeCorrentista') {
				$data = Correntistas::whereIn('IDCorrentista', $this->buscaAutores($q))->paginate(10);
			}
			else {
				$data = Correntistas::where($tipo, 'LIKE', '%'.$q.'%')->paginate(10);
			}
			
    	// Inclui dados dos autores em cada item encontrado
    	foreach ($data as $key => $value) {
    		$autores = collect(['Correntistas' => (new CorrentistaController)->getCorrentista($value->IDCorrentista)]);
    		$data[$key] = $autores->merge($value);
			// TODO: Verificar se possui arquivo BLOB
    		foreach ($data[$key] as $newKey => $newValue) {
    			if($newKey === 'ARQUIVO' && !is_null($newValue)) {
    				// Retorna valor nulo em vez de tentar interpretar arquivo BLOB como texto.
    				$data[$key][$newKey] = null;
    			}
    		}    		
    	}
    	return response()->json($data);
    }
}
