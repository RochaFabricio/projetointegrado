<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Switchs extends Model
{
    protected $fillable = [
        "marca",
        "modelo",
        "qtd_portas",
        "porta_inicio",
        "local_id",
        "rede_ip",
        "usuario",
        "senha"
    ];

    protected $table = "switch";
}
