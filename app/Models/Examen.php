<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    // Les champs que tu souhaites autoriser pour le remplissage en masse
    protected $fillable = [
        'patients_id',
        'personnel_medical_id',
        'dossier_medical_id',
        'type_examen',
        'categorie',
        'code_loinc',
        'nom_laboratoire',
        'plage_reference',
        'valeur_critique',
        'valeur_obtenue',
        'fichier_resultat',
        'statut_validation',
    ];

    /**
     * Relation avec la table 'patients'.
     * Un examen appartient à un patient.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patients_id');
    }

    /**
     * Relation avec la table 'personnel_medical'.
     * Un examen est réalisé par un personnel médical.
     */
    public function personnelMedical()
    {
        return $this->belongsTo(PersonnelMedical::class, 'personnel_medical_id');
    }

    /**
     * Relation avec la table 'dossier_medicaux'.
     * Un examen est lié à un dossier médical.
     */
    public function dossierMedical()
    {
        return $this->belongsTo(DossierMedical::class, 'dossier_medical_id');
    }

    /**
     * Fonction qui retourne l'URL du fichier résultat si présent.
     */
    public function getFichierResultatUrlAttribute()
    {
        return $this->fichier_resultat ? asset('storage/' . $this->fichier_resultat) : null;
    }
}
