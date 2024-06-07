<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teste;
use Illuminate\Support\Facades\DB;


class TesteController extends Controller
{
    public function store(Request $request)
    {
   
        $request->validate([
            'descricao' => 'required|string',
            'pontuacao' => 'required|string'
        ]);

        
        $usuarioId = Auth::id();

     
        $teste = Teste::create([
            'descricao' => $request->descricao,
            'pontuacao' => $request->pontuacao,
            'usuario_id' => $usuarioId
        ]);
        return redirect()->route('home')->with('success', 'Logado com sucesso!');
   
    }

    public function view($id)
    {
     
       
        $result = DB::table('testes')
        ->join('questoes', 'testes.id', '=', 'questoes.teste_id')
        ->where('testes.id', $id)
        ->select('testes.*', 'questoes.*')
        ->get();
    
        return view('teste', compact('result'));
    }

    public function delete($id){

    $teste = Teste::find($id);

    $teste->delete();


    return redirect()->route('home')->with('success', 'Teste deletado com sucesso.');
    }

}
