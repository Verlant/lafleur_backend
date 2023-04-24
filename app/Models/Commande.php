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
        "etat_livraison"
    ];
    public $timestamps = false;

    public function commandesFournisseurs()
    {
        return $this->hasMany(CommandeFournisseur::class);
    }

    public function commandesClients()
    {
        return $this->hasMany(CommandeClient::class);
    }
}
