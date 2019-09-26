<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenacao extends Model
{
    protected $fillable = [
        "campus_id",
        "user_id",
        "incio",
        "fim"
    ];

    protected $table = "coordenacao";
}
