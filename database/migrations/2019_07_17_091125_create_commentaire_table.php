<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('sid')
                  ->foreign('sid')
                  ->references('id')
                  ->on('sujetsts')
                  ->onDelete('cascade');
            
            $table->string('uid')
                  ->foreign('uid')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            
            $table->string('text');
            
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
        Schema::dropIfExists('commentaires');
    }
}
