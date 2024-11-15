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
            $table->dateTime('service_date');
            $table->text('details')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->dropColumn('user_id'); // Menghapus kolom user_id
    });
}
}
