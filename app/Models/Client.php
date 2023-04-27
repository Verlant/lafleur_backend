<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = "clients";
    protected $primaryKey = "id";
    protected $fillable = [
        "nom_personne",
        "prenom_personne",
        "email",
        "mdp",
        "tel",
        "date_creation",
        "date_modif",
        "adresse_id"
    ];
    public $timestamps = false;
    protected $hidden = [
        'mdp',
    ];

    public function adresse()
    {
        return $this->belongsTo(Adresse::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
