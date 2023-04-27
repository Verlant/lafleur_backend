<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fleur extends Model
{
    use HasFactory;
    protected $table = "fleurs";
    protected $primaryKey = "id";
    protected $fillable = [
        "nom_fleur",
        "quantite_stock",
        "date_inventaire"
    ];
    public $timestamps = false;

    public function unite()
    {
        return $this->belongsTo(Unite::class);
    }

    public function couleur()
    {
        return $this->belongsTo(Couleur::class);
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class)->withPivot('quantite_fleur'); // belongsToMany = many to many
    }
}
