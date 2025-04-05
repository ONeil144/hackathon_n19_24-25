<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('prenom')->nullable()->change();
            $table->string('role')->nullable()->change();
            $table->string('avatar')->nullable()->change();
            $table->string('code_personnel')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('prenom')->nullable(false)->change();
            $table->string('role')->nullable(false)->change();
            $table->string('avatar')->nullable(false)->change();
            $table->string('code_personnel')->nullable(false)->change();
        });
    }
};