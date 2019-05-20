<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Acervo;

class AcervoController extends Controller
{
    /**
     * Variável de classe Acervo
     *
     * @var Acervo
     **/
    private $item;

    function __construct(Acervo $item)
    {
        $this->item = $item;
    }

    public function index(){
        $data = ['data' => DB::table('acervo')->get()];
        return response()->json($data);

        // Método paginado
        // return response()->json($this->shazam->paginate(3));

        // ANTIGO
        /*
    	$items = DB::table('acervo')->limit(99)->get();
    	
        $itemsCoded = [];
    	foreach ($items as $key => $value) {
    		array_push($itemsCoded, $value);
    	}
    	return json_encode($itemsCoded);
        */
    }

    // public function pag($pg = 10){
    public function pag(){
        return response()->json(Acervo::all()->paginate(10));
    }

    public function mostrar($id){
    	// return $response()->json(DB::table('acervo')->get($item));
        // $data = DB::table('acervo')->where('IDAcervo',$id)->first();
        $data = Acervo::find($id);
        return response()->json($data);
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
