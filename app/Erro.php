<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Erro extends Model
{
    protected $fillable = [
        "user_id",
        "view",
        "descricao",
    ];

    public function user() {
        return $this->hasMany('App\User');
    }

    protected $table = "erro";
}
