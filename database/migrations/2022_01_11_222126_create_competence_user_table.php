<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenceUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competence_user', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId("user_id")->constrained("users","id")->onDelete("cascade");
            $table->bigInteger('competence_id')->unsigned();
            $table->foreign('competence_id')
            ->references('id')->on('competences')
            ->onDelete('cascade');
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
        Schema::dropIfExists('user_competence');
    }
}
