<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workflow extends Model {
    use HasFactory;

    protected $fillable = ['patient_id', 'personnel_medical_id', 'etapes','creationsAlerte' ];

    public function patient() {
        return $this->belongsTo(Patient::class);
    }

    public function personnelMedical() {
        return $this->belongsTo(User::class, 'personnel_medical_id');
    }

    public function notifications() {
        return $this->hasMany(Notification::class);
    }
}

