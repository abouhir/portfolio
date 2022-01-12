<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("image");
            $table->string("coverture_image");
            $table->text("description");
            $table->string("adresse");
            $table->string("telephone");
            $table->string("facebook")->nullable(true);
            $table->string("linkedin")->nullable(true);
            $table->string("github")->nullable(true);
            $table->foreignId("user_id")->constrained("users","id")->onDelete("cascade");
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
        Schema::dropIfExists('profiles');
    }
}
