<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLangueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_langue', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId("user_id")->constrained("users","id")->onDelete("cascade");
            $table->integer('langue_id')->unsigned();
            $table->foreign('langue_id')
            ->references('id')->on('langues')
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
        Schema::dropIfExists('user_langue');
    }
}
