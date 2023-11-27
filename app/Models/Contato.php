<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = ['nome', 'numero_celular', 'email', 'nota'];

    // Define um relacionamento um-para-muitos com o modelo Endereco
    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }
}
