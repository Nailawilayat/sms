<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();  // This will create an auto-incrementing 'id' column
            $table->string('name');  // This creates a 'name' column
            $table->string('duration');  // This creates a 'duration' column
            $table->text('description');  // This creates a 'description' column
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade');  // This creates a foreign key column 'teacher_id'
            $table->timestamps();  // This adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
