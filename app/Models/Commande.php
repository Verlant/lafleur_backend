<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $table = "commandes";
    protected $primaryKey = "id";
    protected $fillable = [
        "date_commande",
        "date_livraison",
        "etat_paiement",
        "etat_livraison",
        "frais_livraison",
        "client_id",
        "loterie_id"
    ];
    public $timestamps = false;

    public function produits()
    {
        return $this->belongsToMany(Produit::class)->withPivot('quantite_vente'); // belongsToMany = many to many
    }

    public function loterie()
    {
        return $this->belongsTo(Loterie::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
