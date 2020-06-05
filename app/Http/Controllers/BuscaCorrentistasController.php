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

    public function buscaCorrentistas($q) {
    	// $idList = DB::table('correntistas')->where('NomeCorrentista', 'LIKE', '%'.$q.'%')
    	// ->orWhere('IDCorrentista', 'LIKE', '%'.$q.'%')
    	// ->join('correntistas', 'emprestimos.IDCorrentista', '=', 'correntistas.IDCorrentista')
    	// ->select('correntista.IDCorrentista')
		// ->get();
		$idList = DB::table('correntistas')->where('NomeCorrentista', 'LIKE', '%'.$q.'%')
    	->select('correntistas.IDCorrentista')
    	->get();
    	$idArr = array();
    	foreach ($idList as $key => $value) {
    		foreach ($value as $i => $v) {
    			array_push($idArr, $v);
    		}
    	}
    	return $idArr;
	}
	

    public function buscaEmprestimos($q) {
    	$idList = DB::table('emprestimos')->where('IDCorrentista', 'LIKE', '%'.$q.'%')
    	->join('correntistas', 'emprestimos.IDCorrentista', '=', 'correntistas.IDCorrentista')
    	->select('correntistas.IDCorrentista')
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
    										->orWhere('Tipo', 'LIKE', '%'.$q.'%')
    										->orWhere('Email', 'LIKE', '%'.$q.'%')
    										->orWhere('Setor', 'LIKE', '%'.$q.'%')
    										->orWhereIn('IDCorrentista', $this->buscaCorrentistas($q))
    										->paginate(10);
			}
			else if ($tipo === 'NomeCorrentista') {
				$data = Correntistas::whereIn('IDCorrentista', $this->buscaCorrentistas($q))->paginate(10);
			}
			else {
				$data = Correntistas::where($tipo, 'LIKE', '%'.$q.'%')->paginate(10);
			}
			
    	// Inclui dados dos autores em cada item encontrado
    	foreach ($data as $key => $value) {
    		$correntistas = collect(['NomeCorrentistas' => (new CorrentistasController)->getEmprestimos($value->IDCorrentista)]);
    		$data[$key] = $correntistas->merge($value);
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

