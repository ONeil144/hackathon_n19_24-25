<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('dossier_medical', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patient'); // <-- Spécifiez 'patient' explicitement
            $table->date('datecreation');
            $table->text('allergies')->nullable();
            $table->text('traitementactuel')->nullable();
            $table->text('traitementprecedent')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('dossier_medical');
    }
};
