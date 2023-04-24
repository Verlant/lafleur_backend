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
        Schema::create('commande_fournisseur_fleur', function (Blueprint $table) {
            $table->unsignedBigInteger("commande_fournisseur_id");
            $table->unsignedBigInteger("fleur_id");
            $table->integer("quantite_achat");
            $table->decimal("prix_achat", 10, 2);
            $table->foreign("commande_fournisseur_id")->references("commande_id")->on("commande_fournisseur");
            $table->foreign("fleur_id")->references("id")->on("fleurs");
            $table->primary(["commande_fournisseur_id", "fleur_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_fournisseur_fleur');
    }
};
