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
        Schema::create('ventilations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livreur_id')->constrained();
            $table->string('code');
            $table->date('date_ventilation');
            $table->integer('ventile');
            $table->integer('non_ventile');
            $table->integer('retour');
            $table->integer('pu');
            $table->integer('location');
            $table->integer('montant_verse');
            $table->integer('qte_vendue');
            $table->integer('montant_a_verse');
            $table->integer('reliquat');
            $table->enum('status', ['Actif', 'Archiver'])->default('Actif');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventilations');
    }
};
