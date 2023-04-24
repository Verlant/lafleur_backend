<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = "clients";
    protected $primaryKey = "personne_id";
    protected $fillable = ["mdp"];
    public $timestamps = false;
    protected $hidden = [
        'mdp',
    ];

    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }

    public function adresses()
    {
        return $this->belongsToMany(Adresse::class); // belongsToMany = many to many
    }

    public function commandes()
    {
        return $this->hasMany(CommandeClient::class);
    }
}
