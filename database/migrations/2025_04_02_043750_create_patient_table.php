<?php

use Illuminate\Database\Migrations\Migration; // <-- Ajoutez cette ligne
use Illuminate\Database\Schema\Blueprint;    // <-- Optionnel (déjà utilisé pour Schema)
use Illuminate\Support\Facades\Schema;      // <-- Optionnel (si vous utilisez Schema::)


return new class extends Migration {

    public function up() {
        Schema::create('patient', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('nationalite');
            $table->enum('sexe', ['M', 'F']);
            $table->string('adresse');
            $table->string('ethnie')->nullable();
            $table->string('ville');
            $table->float('poids');
            $table->float('taille');
            $table->string('profession');
            $table->string('telephone')->unique();
            $table->string('groupesanguin');
            $table->string('stadeMRC')->nullable();
            $table->foreignId('personnel_medical_id')->constrained('users');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('patient');
    }
};
