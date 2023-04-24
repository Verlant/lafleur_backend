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
        Schema::create('commande_client', function (Blueprint $table) {
            $table->unsignedBigInteger("commande_id");
            $table->unsignedBigInteger("loterie_id")->nullable();
            $table->unsignedBigInteger("client_personne_id");
            $table->unsignedBigInteger("adresse_livraison_id");
            $table->decimal("frais_livraison", 10, 2);
            $table->foreign("commande_id")->references("id")->on("commandes");
            $table->foreign("loterie_id")->references("id")->on("loteries");
            $table->foreign("client_personne_id")->references("personne_id")->on("clients");
            $table->foreign("adresse_livraison_id")->references("id")->on("adresses");
            $table->primary("commande_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_client');
    }
};
