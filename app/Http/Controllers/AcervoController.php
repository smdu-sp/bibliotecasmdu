<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Acervo;

class AcervoController extends Controller
{
    public function getAutores($IDAcervo){
        $autores = DB::table('autoresdoacervo')->where('IDAcervo', '=', $IDAcervo)
        ->join('autores', 'autoresdoacervo.IDAutor', '=', 'autores.IDAutor')
        ->select('autores.IDAutor','autores.NomeDoAutor','autoresdoacervo.Sequencia','autores.Cutter')
        ->get();

        return $autores;
    }

    public function index(){
        // Método padrão excede tempo limite. Utilizado método explícito (declarado nome da tabela)
        // $data = ['data' => Acervo::all()];
        $data = ['data' => DB::table('acervo')->get()];
        return response()->json($data);        
    }

    /**
        Retorno padrão - resultados paginados
    **/
    public function pag(){
        $data = Acervo::paginate(10);
        // Inclui dados dos autores em cada item do acervo
        foreach ($data as $key => $value) {
            $autores = collect(['Autores' => $this->getAutores($value->IDAcervo)]);            
            $data[$key] = $autores->merge($value);
        }

        return response()->json($data);
    }

    public function mostrar($id){
        // Retorna item do acervo
        $item = Acervo::find($id);

        // Popula item com os autores
        $autores = collect(['Autores' => $this->getAutores($id)]);

        $data = $autores->merge($item);

        // Retorna resultado em JSON
        return response()->json(['data' => $data]);
    }

    public function cadastrar(Request $request){
    	$item = Acervo::create($request->all());

    	return response()->json('Cadastro realizado', 201);
    }

    /*
    public function editar(Request $request, Acervo $item){
    	$item->update($request->all());

    	return response()->json($item, 200);
    }
    */

    // public function editar($id){
    //     $item = Acervo::find($id);
    //     return response()->json($item);
    // }

    public function atualizar($id, Request $request){
        $item = Acervo::find($id);
        $item->update($request->all());

        return response()->json('atualizado com sucesso');
    }

    public function deletar(Acervo $item){
    	$item->delete();

    	// return response()->json(null, 204);
        return response()->json('apagado com sucesso');
    }
}
