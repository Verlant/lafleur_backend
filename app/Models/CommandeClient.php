<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CommandeClient extends Model
{
    use HasFactory;
    protected $table = "commande_client";
    protected $primaryKey = "commande_id";
    protected $fillable = [
        "loterie_id",
        "client_personne_id",
        "adresse_livraison",
        "frais_livraison"
    ];
    public $timestamps = false;

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function loterie()
    {
        return $this->belongsTo(Loterie::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function adresse()
    {
        return $this->belongsTo(Adresse::class);
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class, "commande_client_produit", "commande_client_id", "produit_id");
    }
}
