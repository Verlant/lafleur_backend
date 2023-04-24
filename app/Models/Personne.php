<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;
    protected $table = "personnes";
    protected $primaryKey = "id";
    protected $fillable = [
        "nom_personne",
        "prenom_personne",
        "email", "tel",
        "date_creation",
        "date_modif"
    ];
    public $timestamps = false;


    public function fournisseur()
    {
        return $this->hasOne(Fournisseur::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }
}
