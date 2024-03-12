<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_info_id');
            $table->foreign('personal_info_id')->references('id')->on('personal_info')->onDelete('cascade');
            $table->string('workplace');
            $table->string('job_type');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('duties');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};
