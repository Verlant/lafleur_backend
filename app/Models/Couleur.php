<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couleur extends Model
{
    use HasFactory;
    protected $table = "couleurs";
    protected $primaryKey = "id";
    protected $fillable = [
        "nom_couleur"
    ];
    public $timestamps = false;

    public function fleurs()
    {
        return $this->hasMany(Fleur::class);
    }
}
