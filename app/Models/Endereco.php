<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['cep', 'rua', 'numero', 'complemento', 'bairro', 'cidade', 'estado'];

    // Define o inverso do relacionamento um-para-muitos com o modelo Contato
    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }
}
