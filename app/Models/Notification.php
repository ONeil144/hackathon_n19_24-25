<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model {
    use HasFactory;

    protected $fillable = ['patient_id', 'personnel_medical_id', 'workflow_id', 'message', 'vu'];

    public function patient() {
        return $this->belongsTo(Patient::class);
    }

    public function personnelMedical() {
        return $this->belongsTo(User::class, 'personnel_medical_id');
    }

    public function workflow() {
        return $this->belongsTo(Workflow::class);
    }
}
