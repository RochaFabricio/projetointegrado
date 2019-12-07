<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vlan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identificador_vlan');
            $table->string('ip');
            $table->string('descricao');
            $table->string('cor');
            $table->string('mascara');
            $table->integer('rede_id');
            $table->string('dhcp');
            $table->string('qtd_hosts');
            $table->string('range_inicial');
            $table->string('site_to_site');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vlan');
    }
}
