<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Jogos extends Model
{
    protected $table = 'Jogos';
    protected $primaryKey = 'id_jogo';
    public $timestamps = false;

    protected $fillable = [
        'nome_jogo',
        'plataforma',
        'valor',
        //'discount',
        'description',
        //'final_price',
        'image_path'
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
    public function getJogos()
    {
        return $this->select('j.*')
        ->get();
    }

    // ? VERIFICAR SE REALMENTE É NECESSÁRIO AQUI DEPOIS
    public function getImagemAttribute()
    {
        return $this->image_path ? Storage::disk('s3')->temporaryUrl($this->image_path, now()->addMinutes(5)) : asset('assets/images/defaultGame.jpg');
    }

    public function JogosGenero()
    {
        return $this->hasMany(Jogo_genero::class, 'id_jogo');
    }
    public function Wishlist()
    {
        return $this->hasMany(Wishlist::class, 'id_jogo');
    }
    public function carrinho()
    {
        return $this->hasMany(Carrinho::class, 'id_jogo');
    }
}
