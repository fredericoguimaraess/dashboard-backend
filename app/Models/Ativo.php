<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Ativo extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['ticket', 'data_compra', 'quantidade', 'cotacao', 'tipo'];
}
