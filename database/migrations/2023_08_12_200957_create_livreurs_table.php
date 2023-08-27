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
        Schema::create('livreurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('structure_id')->constrained();
            $table->string('matricule');
            $table->string('prenom');
            $table->string('nom');
            $table->integer('taux')->nullable();
            $table->string('telephone');
            $table->string('adresse')->nullable();
            $table->boolean('typePiece')->default(0);
            $table->string('numeroPiece')->nullable();
            $table->string('photo')->nullable();
            $table->enum('status', ['Actif', 'Inactif'])->default('Actif');
            $table->timestamps();
        });
        schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livreurs');
    }
};
