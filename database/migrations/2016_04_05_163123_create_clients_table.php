<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('company');
            $table->string('email')->unique();
            $table->tinyInteger('has_responded')->default(0);
            $table->tinyInteger('is_suscribed')->default(0);
            $table->integer('times_sent')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('clients', function(Blueprint $table){
            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }
}
