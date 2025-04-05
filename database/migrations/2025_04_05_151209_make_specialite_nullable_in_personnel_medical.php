<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('personnel_medical', function (Blueprint $table) {
            $table->string('specialite')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('personnel_medical', function (Blueprint $table) {
            $table->string('specialite')->nullable(false)->change();
        });
    }
};