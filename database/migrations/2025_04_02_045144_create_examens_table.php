<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patient');
            $table->foreignId('personnel_medical_id')->constrained('users');
            $table->foreignId('dossier_medical_id')->constrained('dossier_medical');
            $table->string('typeExamen');
            $table->json('resultats');
            $table->string('nomLaboratoire');
            $table->json('plagesReferences')->nullable();
            $table->json('valeurscritiques')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('examens');
    }
};
