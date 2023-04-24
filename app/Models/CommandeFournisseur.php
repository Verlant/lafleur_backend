<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeFournisseur extends Model
{
    use HasFactory;
    protected $table = "commande_fournisseur";
    protected $primaryKey = "commande_id";
    protected $fillable = [
        "fournisseur_personne_id"
    ];
    public $timestamps = false;

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function fleurs()
    {
        return $this->belongsToMany(Fleur::class, "commande_fournisseur_fleur", "commande_fournisseur_id", "fleur_id"); // belongsToMany = many to many
    }
}
