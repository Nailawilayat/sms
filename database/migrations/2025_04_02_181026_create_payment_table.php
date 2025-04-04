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
        Schema::create('payments', function (Blueprint $table) { // Table name should be 'payments'
            $table->id();
            $table->foreignId('enrollment_id')->constrained()->onDelete('cascade'); // Foreign key to enrollments table
            $table->date('paid_date'); // Date when payment was made
            $table->decimal('amount', 10, 2); // Amount with 2 decimal places
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
