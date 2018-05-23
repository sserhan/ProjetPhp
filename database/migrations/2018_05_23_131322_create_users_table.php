<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->integer('idgroupe')->unsigned()->nullable();
            $table->date('date_naissance');
            $table->string('linkedin')->nullable();
            $table->string('entreprise')->nullable();
            $table->string('niveau');
            $table->string('email');
            $table->string('password',60);
            $table->boolean('admin')->default(false);
            $table->string('numero')->nullable();
            $table->string('photo')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users',function (Blueprint $table){
            $table->foreign('idgroupe')->references('id')->on('groupe');//->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('users_groupe_foreign');
        });
        Schema::drop('users');
    }
}