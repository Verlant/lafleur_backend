<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    protected $table = "villes";
    protected $primaryKey = "id";
    protected $fillable = ["nom_ville", "est_livrable"];
    public $timestamps = false;

    public function adresses()
    {
        return $this->hasMany(Adresse::class);
    }
}
