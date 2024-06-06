<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'senha' => 'required'
        ], [
            'login.required' => 'O campo de login é obrigatório',
            'senha.required' => 'O campo de senha é obrigatório'
        ]);

        // Extrai as credenciais da requisição
        $credentials = $request->only('login', 'senha');

        // Busca o usuário pelo login
        $user = User::where('login', $credentials['login'])->first();

        // Verifica se o usuário existe e se a senha corresponde
        if ($user && $user->senha === $credentials['senha']) {
            // Autentica o usuário manualmente
            Auth::login($user);
            return redirect()->route('home')->with('success', 'Logado com sucesso!');
        } else {
            return redirect()->route('login.index')->withErrors(['error' => 'Login ou senha inválidos!']);
        }
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login.index')->with('success', 'Deslogado com sucesso!');
    }
}
