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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->foreignId('structure_id')->constrained();
            $table->string('prenom');
            $table->string('nom');
            $table->string('telephone');
            $table->string('date_naissance');
            $table->string('lieu_naissance');
            $table->string('fonction');
            $table->date('date_embauche');
            $table->string('photo');
            $table->timestamps();
        });
        schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
