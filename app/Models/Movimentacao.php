<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    use HasFactory;

    protected $fillable = ['ativo_id', 'data', 'quantidade', 'tipo'];

    protected $table = 'movimentacoes';

    public function ativo()
    {
        return $this->belongsTo(Ativo::class, 'ativo_id')->withTrashed();
    }
}
