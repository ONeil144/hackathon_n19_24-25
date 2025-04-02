<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model {
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom', 'nationalite', 'sexe', 'adresse', 'ethnie', 'ville',
        'poids', 'taille', 'profession', 'telephone', 'groupesanguin', 'stadeMRC',
        'personnel_medical_id'
    ];

    public function personnelMedical() {
        return $this->belongsTo(User::class, 'personnel_medical_id');
    }

    public function dossierMedical() {
        return $this->hasOne(DossierMedical::class);
    }

    public function consultations() {
        return $this->hasMany(Consultation::class);
    }

    public function traitements() {
        return $this->hasMany(Traitement::class);
    }

    public function examens() {
        return $this->hasMany(Examen::class);
    }

    public function workflows() {
        return $this->hasMany(Workflow::class);
    }

    public function notifications() {
        return $this->hasMany(Notification::class);
    }
}
