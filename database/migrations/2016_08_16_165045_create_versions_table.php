<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versions', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('version');
            $table->string('mode');
            $table->boolean('deprecated');
            $table->string('remark')->nullable();
            $table->timestamps();
            $table->unique(['version', 'mode']);
        });
    }

    /**
     * Reverse the migrations.
     * * @return void
     */
    public function down()
    {
        Schema::drop('versions');
    }
}
