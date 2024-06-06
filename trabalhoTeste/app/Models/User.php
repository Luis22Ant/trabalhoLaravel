<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = ['login', 'senha', 'nome'];
    protected $hidden = ['senha'];
    public $timestamps = true;
    
    public function testes()
    {
        return $this->hasMany(Teste::class);
    }
}
