<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teste;

class HomeController extends Controller
{
    public function index()
    {
        // Obtém o usuário logado
        $usuario = Auth::user();
    
        // Obtém todos os testes associados ao usuário logado
        $testes = Teste::where('usuario_id', $usuario->id)->get();

        // Passa os testes para a view home.blade.php
        return view('home', compact('testes'));
    }


}
