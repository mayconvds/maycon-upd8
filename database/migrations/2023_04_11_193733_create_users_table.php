<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('cpf')->unique();
            $table->integer('sex');
            $table->date("date_of_birth");
            $table->string("street");
            $table->integer("state_id");
            $table->integer("city_id");
            $table->timestamps();


            $table->foreign("state_id")->references("id")->on("states")->onDelete("CASCADE");
            $table->foreign("city_id")->references("id")->on("CITIES")->onDelete("CASCADE");
            $table->index(["name", "sex", "date_of_birth"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
