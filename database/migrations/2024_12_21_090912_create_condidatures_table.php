<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('students_id')->constrained()->onDelete('cascade');
            $table->foreignId('projects_id')->constrained()->onDelete('cascade');
            $table->enum('statut', ['en attente', 'acceptée', 'refusée']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('condidatures');
    }
};
