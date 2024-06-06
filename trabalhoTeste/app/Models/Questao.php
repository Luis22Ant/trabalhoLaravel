<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    public $timestamps = false;
    protected $table = 'questoes';
    protected $fillable = ['descricao', 'textoA', 'textoB', 'textoC', 'textoD', 'textoE', 'resposta', 'valorTotal','teste_id'];
    protected $guarded = ['id'];

    public function teste()
    {
        return $this->belongsTo(Teste::class);
    }
}
