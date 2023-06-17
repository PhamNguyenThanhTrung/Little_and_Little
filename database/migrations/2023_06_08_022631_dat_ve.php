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
        Schema::create('book_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('Ticket_type');
            $table->string('Quantity');
            $table->date('Date_of_use');
            $table->string('Full_name');
            $table->string('Tell');
            $table->string('Email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_tickets');
    }
};
