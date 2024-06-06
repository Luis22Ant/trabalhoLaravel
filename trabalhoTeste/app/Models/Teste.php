<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teste extends Model
{
    public $timestamps = false;
    protected $table = 'testes';
    protected $fillable = ['descricao', 'usuario_id','pontuacao'];
    protected $guarded = ['id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function questoes()
    {
        return $this->hasMany(Questao::class);
    }
}