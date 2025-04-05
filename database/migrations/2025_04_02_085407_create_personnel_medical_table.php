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
        Schema::create('personnel_medical', function (Blueprint $table) {
            $table->id();
            $table->string('specialite'); // Spécialité du personnel médical
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade'); // Clé étrangère vers users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnel_medical');
    }
};
