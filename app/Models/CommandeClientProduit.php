<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CommandeClientProduit extends Model
{
    use HasFactory;
    protected $table = "commande_client_produit";
    protected $primaryKey = ["commande_client_id", "produit_id"];
    protected $fillable = [
        "quantite_vente",
    ];
    public $timestamps = false;
}
