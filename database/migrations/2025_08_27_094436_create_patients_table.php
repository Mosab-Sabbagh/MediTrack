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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
            $table->string('id_number')->nullable(); // رقم الهوية أو الرقم الوطني
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male','female'])->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
