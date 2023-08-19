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
        Schema::create('ventilation__abonnements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('abonnement_id')->constrained();
            $table->date('date_ventilation');
            $table->integer('qte');
            $table->integer('pu');
            $table->integer('montant');
            $table->timestamps();
        });
        schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventilation__abonnements');
    }
};
