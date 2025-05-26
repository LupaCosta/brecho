<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'tipo',
        'tamanho',
        'valor',
        'status',
        'categoria_id',
        'cliente_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function estoque()
    {
        return $this->hasOne(\App\Models\Estoque::class, 'produto_id');
    }

    public function vendaItems()
    {
        return $this->hasMany(VendaItem::class);
    }
}
