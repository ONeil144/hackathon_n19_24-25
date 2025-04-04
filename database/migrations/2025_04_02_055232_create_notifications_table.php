<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patient');
            $table->foreignId('personnel_medical_id')->constrained('users');            
            $table->foreignId('workflow_id')->constrained();
            $table->text('message');
            $table->boolean('vu')->default(false);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('notifications');
    }
};
