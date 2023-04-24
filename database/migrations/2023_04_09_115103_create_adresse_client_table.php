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
        Schema::create('adresse_client', function (Blueprint $table) {
            $table->unsignedBigInteger("adresse_id");
            $table->unsignedBigInteger("client_personne_id");
            $table->foreign("adresse_id")->references("id")->on("adresses");
            $table->foreign("client_personne_id")->references("personne_id")->on("clients");
            $table->primary(["adresse_id", "client_personne_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresse_client');
    }
};
