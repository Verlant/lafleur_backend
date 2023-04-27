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
        Schema::create('commande_produit', function (Blueprint $table) {
            $table->unsignedBigInteger("commande_id");
            $table->unsignedBigInteger("produit_id");
            $table->integer("quantite_vente");
            $table->foreign("produit_id")->references("id")->on("produits");
            $table->foreign("commande_id")->references("id")->on("commandes");
            $table->primary(["commande_id", "produit_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_produit');
    }
};
