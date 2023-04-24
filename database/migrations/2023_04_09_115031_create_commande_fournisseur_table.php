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
        Schema::create('commande_fournisseur', function (Blueprint $table) {
            $table->unsignedBigInteger("commande_id");
            $table->unsignedBigInteger("fournisseur_personne_id");
            $table->foreign("commande_id")->references("id")->on("commandes");
            $table->foreign("fournisseur_personne_id")->references("personne_id")->on("fournisseurs");
            $table->primary("commande_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_fournisseur');
    }
};
