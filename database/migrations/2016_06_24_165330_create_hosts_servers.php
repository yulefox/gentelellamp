<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHostsServers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing hosts
        Schema::create('hosts', function (Blueprint $table) {
            $table->integer('id')->unsigned()->unique();
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->string('lan_ip');
            $table->string('wan_ip');
            $table->timestamps();
        });

        // Create table for storing servers
        Schema::create('servers', function (Blueprint $table) {
            $table->integer('id')->unsigned()->unique();
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->integer('host_id')->unsigned();
            $table->integer('port')->unsigned();
            $table->string('version');
            $table->string('platform');
            $table->timestamps();

            $table->foreign('host_id')->references('id')->on('hosts')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('servers');
        Schema::drop('hosts');
    }
}
