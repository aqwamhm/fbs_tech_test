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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('route');
            $table->date('departure_date');
            $table->time('departure_time');
            $table->unsignedInteger('total_seats')->default(12);
            $table->decimal('price', 10, 2);
            $table->string('driver_name')->nullable();
            $table->string('vehicle_number')->nullable();
            $table->enum('travel_permit_status', ['pending', 'issued'])->default('pending');
            $table->timestamp('travel_permit_issued_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['departure_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
