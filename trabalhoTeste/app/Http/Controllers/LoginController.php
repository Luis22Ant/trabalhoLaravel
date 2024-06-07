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

  
        $credentials = $request->only('login', 'senha');

 
        $user = User::where('login', $credentials['login'])->first();


        if ($user && $user->senha === $credentials['senha']) {
       
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
