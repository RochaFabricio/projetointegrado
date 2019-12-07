<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ips extends Model
{
    protected $fillable = [
        "ip",
        "rede_id",
        "uso",
    ];

    public function rede() {
        return $this->hasMany('App\Rede', 'rede_id');
    }

    protected $table = "ips_validos"; 
}
