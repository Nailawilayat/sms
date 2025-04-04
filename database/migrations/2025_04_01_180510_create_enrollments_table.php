<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade'); // Ensures the student exists and is deleted if the student is deleted
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // Ensures the course exists and is deleted if the course is deleted
            $table->date('enrollment_date');
            $table->enum('status', ['active', 'completed', 'dropped']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
}
