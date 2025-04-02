<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('workflows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patient'); // Spécifiez explicitement 'patient' (sans s)
            $table->foreignId('personnel_medical_id')->constrained('users');
            $table->json('etapes')->nullable();
            $table->json('creationsAlerte')->nullable();
            $table->timestamps();
        });
    }
    
    public function down() {
        Schema::dropIfExists('workflows');
    }
};
