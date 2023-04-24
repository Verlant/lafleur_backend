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
        Schema::create('fleurs', function (Blueprint $table) {
            $table->id();
            $table->string("nom_fleur", 45);
            $table->integer("quantite_stock");
            $table->timestamp("date_inventaire");
            $table->unsignedBigInteger("unite_id");
            $table->unsignedBigInteger("couleur_id");
            $table->foreign("unite_id")->references("id")->on("unites");
            $table->foreign("couleur_id")->references("id")->on("couleurs");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fleurs');
    }
};
