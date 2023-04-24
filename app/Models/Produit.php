<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produit extends Model
{
    use HasFactory;
    protected $table = "produits";
    protected $primaryKey = "id";
    protected $fillable = [
        "prix_vente",
        "date_creation",
        "date_modif",
        "categorie_id",
        "type_produit_id"
    ];
    public $timestamps = false;

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function typeProduit()
    {
        return $this->belongsTo(TypeProduit::class);
    }

    public function fleurs()
    {
        return $this->belongsToMany(Fleur::class)->withPivot('quantite_fleur'); // belongsToMany = many to many
    }

    public function commandeClients()
    {
        return $this->belongsToMany(CommandeClient::class, "commande_client_produit", "produit_id", "commande_client_id"); // belongsToMany = many to many
    }
}
