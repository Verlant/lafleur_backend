<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeProduit extends Model
{
    use HasFactory;
    protected $table = "commande_produit";
    protected $primaryKey = ["commande_produit", "produit_id"];
    protected $fillable = [
        "quantite_vente",
    ];
    public $timestamps = false;
}
