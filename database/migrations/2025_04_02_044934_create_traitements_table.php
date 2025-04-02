<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('traitements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patient'); // <-- Spécifiez 'patient' explicitement
            $table->foreignId('personnel_medical_id')->constrained('users');
            $table->foreignId('dossier_medical_id')->constrained('dossier_medical');
            $table->string('medicament');
            $table->string('posologie');
            $table->date('datedebut');
            $table->date('datefin');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('traitements');
    }
};
