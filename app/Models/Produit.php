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
        "nom_produit",
        "prix_vente",
        "date_creation",
        "date_modif",
        "categorie_id"
    ];
    public $timestamps = false;

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function fleurs()
    {
        return $this->belongsToMany(Fleur::class)->withPivot('quantite_fleur'); // belongsToMany = many to many
    }

    public function commandes()
    {
        return $this->belongsToMany(Commande::class)->withPivot('quantite_vente'); // belongsToMany = many to many
    }
}
