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
        Schema::create('petrins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('structure_id')->constrained();
            $table->float('nbre_sac');
            $table->float('rendement');
            $table->float('qte_produit');
            $table->date('date_petrin');
            $table->string('status', 50);
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petrins');
    }
};
