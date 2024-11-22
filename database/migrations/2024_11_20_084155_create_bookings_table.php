<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Menambahkan kolom user_id
            $table->string('vehicle_type');
            $table->foreignId('service_id')->constrained('services');
            // $table->decimal('price', 10, 2);
            $table->dateTime('service_date');
            $table->text('details')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'completed'])->default('pending');
            $table->timestamp('completed_at')->nullable(); // Menambahkan kolom completed_at
            $table->integer('queue_number')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
