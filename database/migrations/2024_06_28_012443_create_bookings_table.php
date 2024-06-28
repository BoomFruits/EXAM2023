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
        Schema::create('bookings', function (Blueprint $table) {
            $table->integerIncrements('BookingID');
            $table->unsignedInteger('CustomerID');
            $table->foreign('CustomerID')->references('CustomerID')->on('customers')->cascadeOnDelete();
            $table->unsignedInteger('RoomID');
            $table->foreign('RoomID')->references('RoomID')->on('rooms')->cascadeOnDelete();
            $table->date('checkin');
            $table->date('checkout');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
