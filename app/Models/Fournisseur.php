<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $table = "fournisseurs";
    protected $primaryKey = "personne_id";
    protected $fillable = ["SIRET"];
    public $timestamps = false;

    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }

    public function commandes()
    {
        return $this->hasMany(CommandeFournisseur::class);
    }
}
