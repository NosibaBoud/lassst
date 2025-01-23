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
        Schema::create('home_appointments', function (Blueprint $table) {
            $table->id();
           // $table->foreignId('investigation_id')->constrained('user_investigations')->onDelete('cascade');
          //$table->foreignId('user_investigation_id');
         // $table->foreignId('user_id');
         $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // ربط بالجدول المستخدمين
            $table->string('gender');
           $table->foreignId('investigation_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('address');
            $table->string('phone_number');
            $table->date('date_of_birth');
            $table->time('time');
            $table->date('date');
            $table->double('total_cost')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_appointments');
    }
};
