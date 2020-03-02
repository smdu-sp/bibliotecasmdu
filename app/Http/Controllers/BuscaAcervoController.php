<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\BuscaCollection;
use App\Acervo;
use App\Busca;
use App\Http\Controllers\AcervoController;

class BuscaAcervoController extends Controller
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
    	->join('assuntosdoacervo', 'assuntosdoacervo.IDAssunto', '=', 'assuntos.IDAssunto')
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
    	$idList = DB::table('autores')->where('NomeDoAutor', 'LIKE', '%'.$q.'%')
    	->join('autoresdoacervo', 'autoresdoacervo.IDAutor', '=', 'autores.IDAutor')
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
    		$data = Acervo::where('Titulo', 'LIKE', '%'.$q.'%')
    										->orWhere('Subtitulo', 'LIKE', '%'.$q.'%')
    										->orWhere('Resumo', 'LIKE', '%'.$q.'%')
    										->orWhere('Notas', 'LIKE', '%'.$q.'%')
    										->orWhere('NotasComplementares', 'LIKE', '%'.$q.'%')
    										->orWhereIn('IDAcervo', $this->buscaAutores($q))
    										->orWhereIn('IDAcervo', $this->buscaAssuntos($q))
    										->paginate(10);
			}
			else if ($tipo === 'Autor') {
				$data = Acervo::whereIn('IDAcervo', $this->buscaAutores($q))->paginate(10);
			}
			else {
				$data = Acervo::where($tipo, 'LIKE', '%'.$q.'%')->paginate(10);
			}
			
    	// Inclui dados dos autores em cada item encontrado
    	foreach ($data as $key => $value) {
    		$autores = collect(['Autores' => (new AcervoController)->getAutores($value->IDAcervo)]);
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
