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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('crew_id');
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('created_user');

            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('crew_id')->references('id')->on('crews');
            $table->foreign('created_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
