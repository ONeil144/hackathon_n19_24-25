<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierMedical extends Model {
    use HasFactory;

    protected $fillable = ['patient_id', 'datecreation', 'allergies', 'traitementactuel', 'traitementprecedent'];

    public function patient() {
        return $this->belongsTo(Patient::class);
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
}

