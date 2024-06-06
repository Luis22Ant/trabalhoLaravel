<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teste;

class TesteController extends Controller
{
    public function store(Request $request)
    {
        // Valida os dados do formulário
        $request->validate([
            'descricao' => 'required|string',
            'pontuacao' => 'required|string'
        ]);

        // Obtém o ID do usuário autenticado
        $usuarioId = Auth::id();

        // Cria um novo teste com os dados fornecidos e o ID do usuário autenticado
        $teste = Teste::create([
            'descricao' => $request->descricao,
            'pontuacao' => $request->pontuacao,
            'usuario_id' => $usuarioId
        ]);
        return redirect()->route('home')->with('success', 'Logado com sucesso!');
   
    }

}
