<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    protected $primaryKey = 'user_id';
    use HasFactory, Notifiable;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'data_nascimento',
        'id_endereco',
        'is_admin'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function endereco()
    {
        return $this->belongsTo(\App\Models\Enderecos::class, 'id_endereco', 'id_endereco');
    }
    // Verificar se o usuário é Administrador
    public function isAdmin()
    {
        return $this->is_admin === 1;
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'fk_wishlist_to_user', 'user_id');
    }
    public function meus_jogos()
    {
        return $this->hasMany(Meus_Jogos::class, 'fk_meus_jogos_to_user', 'user_id');
    }

    public function hasGame($id_jogo)
    {
        return $this->meus_jogos()
                    ->where('fk_meus_jogos_to_jogos', $id_jogo)
                    ->exists();
    }
    public function hasInWishlist($id_jogo)
    {
        return $this->wishlist()
                    ->where('fk_wishlist_to_jogos' , $id_jogo)
                    ->exists();
    }

    public function jogos()
    {
        return $this->meus_jogos()->belongsTo(Jogos::class, 'fk_meus_jogos_to_jogos', 'id_jogo');
    }
    public function carrinho(){
        return $this->carrinho()->hasMany(Carrinho::class, 'fk_carrinho_to_user', 'user_id');
    }
}
