<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rede extends Model
{
    protected $fillable = [
        "ip",
        "mask"
    ];

    public function ips() {
        return $this->hasMany('App\Ips','rede_id');
    }

    protected $table = "rede"; 
}
