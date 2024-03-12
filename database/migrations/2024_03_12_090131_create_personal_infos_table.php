<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInfoTable extends Migration
{
    public function up()
    {
        Schema::create('personal_info', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('email')->unique();
            $table->string('residence');
            $table->string('Github');
            $table->string('Linkedin');
            $table->string('image')->nullable();
            $table->text('personal_story')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personal_info');
    }
}
