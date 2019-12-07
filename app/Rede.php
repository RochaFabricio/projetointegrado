<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rede extends Model
{
    protected $fillable = [
        "ip",
        "mask"
    ];

    protected $table = "rede"; 
}
