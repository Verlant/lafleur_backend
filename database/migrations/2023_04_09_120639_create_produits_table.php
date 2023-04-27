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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string("nom_produit", 190);
            $table->decimal("prix_vente", 10, 2);
            $table->timestamp("date_creation");
            $table->timestamp("date_modif")->nullable();
            $table->unsignedBigInteger("categorie_id");
            $table->unsignedBigInteger("type_produit_id");
            $table->foreign("categorie_id")->references("id")->on("categories");
            $table->foreign("nom_produit_id")->references("id")->on("noms_produits");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
