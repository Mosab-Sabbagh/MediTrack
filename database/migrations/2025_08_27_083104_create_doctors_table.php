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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 
            $table->string('specialization')->nullable(); // التخصص
            $table->string('phone')->nullable(); // رقم الهاتف
            $table->string('license_number')->nullable(); // رقم الترخيص
            $table->string('working_hours')->nullable(); // أوقات العمل (مثلاً: 9-5)
            $table->string('section')->nullable();//القسم
            
            $table->timestamps();

    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
