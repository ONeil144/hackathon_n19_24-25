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
        Schema::create('examens', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->foreignId('patients_id')
                  ->constrained('patients')
                  ->onDelete('cascade'); // Si le patient est supprimé, les examens le sont aussi

            $table->foreignId('personnel_medical_id')
                  ->constrained('personnel_medical')
                  ->onDelete('cascade'); // Si le personnel est supprimé, les examens aussi

            $table->foreignId('dossier_medical_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Informations sur l'examen
            $table->string('type_examen');             // Ex: Créatinine, Hémoglobine, IRM
            $table->string('categorie')->nullable();   // Ex: Biologique, Imagerie, etc.
            $table->string('code_loinc')->nullable();  // Code standardisé (optionnel)
            $table->string('nom_laboratoire')->nullable(); // Ex: "Laboratoire Pasteur"

            // Résultats
            $table->string('plage_reference')->nullable(); // Ex: 0.7 - 1.3 mg/dL
            $table->string('valeur_critique')->nullable(); // Ex: > 2.0 mg/dL
            $table->string('valeur_obtenue')->nullable();  // Résultat réel de l'examen

            // Statut
            $table->enum('statut_validation', ['en attente', 'validé'])->default('en attente');

            // Fichier (résultat PDF/image)
            $table->string('fichier_resultat')->nullable(); // Chemin du fichier

            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examens');
    }
};
