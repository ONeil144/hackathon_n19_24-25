<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'role', 'specialite'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function patients() {
        return $this->hasMany(Patient::class, 'personnel_medical_id');
    }

    public function consultations() {
        return $this->hasMany(Consultation::class, 'personnel_medical_id');
    }

    public function traitements() {
        return $this->hasMany(Traitement::class, 'personnel_medical_id');
    }

    public function examens() {
        return $this->hasMany(Examen::class, 'personnel_medical_id');
    }

    public function workflows() {
        return $this->hasMany(Workflow::class, 'personnel_medical_id');
    }

    public function notifications() {
        return $this->hasMany(Notification::class, 'personnel_medical_id');
    }
}
