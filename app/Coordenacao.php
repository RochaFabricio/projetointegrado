<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenacao extends Model
{
    protected $fillable = [
        "campus_id",
        "user_id",
        "fim"
    ];

    public function campus() {
        return $this->belongsTo('App\Campus', 'campus_id');
    }

    public function user() {
        return $this->belongsTo('App\USer', 'user_id');
    }

    protected $table = "coordenacao";
}
