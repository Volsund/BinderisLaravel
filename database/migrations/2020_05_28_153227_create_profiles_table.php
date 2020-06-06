<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{

    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('profile_picture')->nullable();
            $table->string('profile_picture_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('location', 30)->nullable();
            $table->string('sex')->nullable();
            $table->integer('age')->nullable();
            $table->text('description')->nullable();
            $table->integer('min_age')->default(18)->nullable();
            $table->integer('max_age')->default(100)->nullable();
            $table->string('gender_interest')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
