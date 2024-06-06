<?php

namespace App\Http\Controllers;

use App\Models\Questao;
use Illuminate\Http\Request;

class QuestaoController extends Controller
{
    public function store(Request $request)
    {
        $questao = Questao::create([
            'descricao' => $request->descricao,
            'textoA' => $request->alterA,
            'textoB' => $request->alterB,
            'textoC' => $request->alterC,
            'textoD' => $request->alterD,
            'textoE' => $request->alterE,
            'resposta' => $request->respCorreta,
            'valorTotal' => $request->valorQuestao,
            'teste_id' => $request->teste_id
        ]);

    
        return redirect('/home')->with('success', 'Questão cadastrada com sucesso!');
    }
}

