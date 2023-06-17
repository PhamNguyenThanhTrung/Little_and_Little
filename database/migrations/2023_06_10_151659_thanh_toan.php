<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('payment_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_book_tickets');
            $table->foreign('id_book_tickets')->references('id')->on('book_tickets')->onDelete('cascade');
            $table->string('Ticket_type');
            $table->string('Quantity');
            $table->date('Date_of_use');
            $table->string('Full_name');
            $table->unsignedBigInteger('Tell');
            $table->string('Email');
            $table->unsignedBigInteger('Card_number');
            $table->string('Full_name_owner');
            $table->string('qrCodePath')->default('');
            $table->string('idqrCodePath')->default('20230615');
            $table->string('qrCode')->default('');

            $table->date('Expiration_date');
            $table->unsignedBigInteger('Security_code');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_page');
    }
};
