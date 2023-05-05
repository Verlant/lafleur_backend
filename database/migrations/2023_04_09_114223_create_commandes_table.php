<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->timestamp("date_commande")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date("date_livraison");
            $table->enum("etat_paiement", ["A", "W", "B"]);
            $table->enum("etat_livraison", ["A", "W", "B"]);
            $table->boolean("frais_livraison");
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('loterie_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('loterie_id')->references('id')->on('loteries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
