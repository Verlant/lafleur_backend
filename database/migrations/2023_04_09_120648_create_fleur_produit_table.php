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
        Schema::create('fleur_produit', function (Blueprint $table) {
            $table->unsignedBigInteger("produit_id");
            $table->unsignedBigInteger("fleur_id");
            $table->integer("quantite_fleur");
            $table->foreign("produit_id")->references("id")->on("produits");
            $table->foreign("fleur_id")->references("id")->on("fleurs");
            $table->primary(["produit_id", "fleur_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fleur_produit');
    }
};
