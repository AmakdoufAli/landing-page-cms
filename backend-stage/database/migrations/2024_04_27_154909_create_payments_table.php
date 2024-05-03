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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_client')->references('id')->on('clients');
            $table->foreignId('id_formation')->references('id')->on('landing_pages');
            $table->string('paymentID');
            $table->string('status');
            $table->string('amount_value');
            $table->string('amount_currency_code');
            $table->string('paymentSource');
            $table->text('generatedUrl');
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
