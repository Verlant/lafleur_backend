<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomProduit extends Model
{
    use HasFactory;
    protected $table = "noms_produits";
    protected $primaryKey = "id";
    protected $fillable = [
        "nom_produit"
    ];
    public $timestamps = false;

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
