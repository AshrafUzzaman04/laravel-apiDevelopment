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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("class_id");
            $table->unsignedBigInteger("section_id");
            $table->string("student_name");
            $table->bigInteger("student_phone");
            $table->string("student_email");
            $table->string("student_address");
            $table->timestamps();
            $table->foreign("class_id")->references("id")->on("classes")->onDelete("cascade");
            $table->foreign("section_id")->references("id")->on("sections")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
