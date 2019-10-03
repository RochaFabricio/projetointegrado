<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $fillable = [
        "sigla",
        "nome",
        "ativo",
    ];

    public function coordenacao() {
        return $this->hasMany('App\Coordenacao', 'user_id');
    }


    protected $table = "campus";
}
