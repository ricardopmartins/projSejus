<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jogos extends Model
{
    protected $table = 'Jogos';
    protected $primaryKey = 'id_jogo';
    public $timestamps = false;

    protected $fillable = [
        'nome_jogo',
        'valor',
        'description',
        'plataforma'
    ];

    // Desconto automático baseado no valor
    public function getDiscountAttribute()
    {
        if ($this->valor >= 100) return 20;
        if ($this->valor >= 50) return 10;
        return null;
    }

    // Preço final já com desconto aplicado
    public function getFinalPriceAttribute()
    {
        if ($this->discount) {
            return $this->valor - ($this->valor * $this->discount /100);
        }
        return $this->valor;
    }

    public function JogosGenero()
    {
        return $this->hasMany(Jogo_genero::class, 'id_jogo');
    }
    public function Wishlist()
    {
        return $this->hasMany(Wishlist::class, 'id_jogo');
    }
}
