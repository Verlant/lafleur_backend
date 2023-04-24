<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleurProduit extends Model
{
    use HasFactory;
    protected $table = "fleur_produit";
    protected $primaryKey = ["produit_id", "fleur_id"];
    protected $fillable = [
        "quantite_fleur"
    ];
    public $timestamps = false;
}
