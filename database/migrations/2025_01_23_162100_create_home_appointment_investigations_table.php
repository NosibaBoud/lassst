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
        Schema::create('home_appointment_investigations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('home_appointment_id')->constrained('home_appointments')->onDelete('cascade'); // ربط الطلب
            $table->foreignId('investigation_id')->constrained('investigations')->onDelete('cascade'); // ربط التحليل
            $table->integer('quantity')->default(1); 
            $table->double('cost'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_appointment_investigations');
    }
};
