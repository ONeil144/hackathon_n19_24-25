<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model {
    use HasFactory;

    protected $fillable = ['patient_id', 'personnel_medical_id', 'dossier_medical_id', 'typeExamen', 'resultats', 'nomLaboratoire', 'plagesReferences', 'valeurscritiques'];

    protected $casts = [
        'resultats' => 'json',
        'plagesReferences' => 'json',
        'valeurscritiques' => 'json',
    ];

    public function patient() {
        return $this->belongsTo(Patient::class);
    }

    public function personnelMedical() {
        return $this->belongsTo(User::class, 'personnel_medical_id');
    }

    public function dossierMedical() {
        return $this->belongsTo(DossierMedical::class);
    }
}

