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
        Schema::create('reglages', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['DATE_PAIEMENT', 'TAUX_COMMISION', 'APP_NAME', 'DEVELOPPEUR', 'AUTRE'])->default('AUTRE');
            $table->string('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reglages');
    }
};
