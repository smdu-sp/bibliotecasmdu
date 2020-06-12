<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Emprestimos;

class EmprestimosController extends Controller
{
    public function getEmprestimos($IDEmprestimo){
        $emprestimos = DB::table('emprestimos')->where('IDEmprestimo', '=', $IDEmprestimo)
        ->join('correntistas', 'emprestimos.IDCorrentista', '=', 'correntistas.IDCorrentista')        
        ->select('emprestimos.IDEmprestimo','emprestimos.IDAcervo','emprestimos.IDPedido','emprestimos.DataEmprestimo','emprestimos.DataDevolucaoPrevista','emprestimos.DataDevolucao')
        ->get();

        return $emprestimos;
    }

    /**
        Retorno padrão - resultados paginados
    **/
    public function pag(){
        $data = Emprestimos::paginate(10);
        // Inclui dados dos correntistas em cada item do acervo
        foreach ($data as $key => $value) {
            $emprestimos = collect(['Emprestimos' => $this->getEmprestimos($value->IDCorrentista)]);            
            $data[$key] = $emprestimos->merge($value);
        }

        return response()->json($data);
    }

    public function mostrar($id){
        // Retorna correntista
        $item = Emprestimos::find($id);
        
        // Popula item com os autores
        $emprestimos = collect(['Emprestimos' => $this->getEmprestimos($id)]);

        $data = $emprestimos->merge($item);

        // Retorna resultado em JSON
        return response()->json(['data' => $data]);
    }

    public function cadastrar(Request $request){
    	$item = Emprestimos::create($request->all());

    	return response()->json('Cadastro realizado', 201);
    }

    public function atualizar($id, Request $request){
        $item = Emprestimos::find($id);
        $item->update($request->all());

        return response()->json('atualizado com sucesso');
    }

    public function deletar(Emprestimos $item){
    	$item->delete();

    	// return response()->json(null, 204);
        return response()->json('apagado com sucesso');
    }
}
