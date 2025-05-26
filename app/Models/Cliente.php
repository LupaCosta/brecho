<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'telefone', 'endereco', 'cep'];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }
}
