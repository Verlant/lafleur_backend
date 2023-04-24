<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeFournisseurFleur extends Model
{
    use HasFactory;
    protected $table = "commande_fournisseur_fleur";
    protected $primaryKey = ["commande_fournisseur_id", "fleur_id"];
    protected $fillable = [
        "quantite_achat",
        "prix_achat"
    ];
    public $timestamps = false;
}
