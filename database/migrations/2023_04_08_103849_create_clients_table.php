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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom_client', 190);
            $table->string('prenom_client', 50);
            $table->string('email', 190)->unique();
            $table->string('mdp', 80);
            $table->char('tel', 10);
            $table->timestamp('date_creation');
            $table->timestamp('date_modif')->nullable();
            $table->foreign('adresse_id')->references('id')->on('adresses');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
