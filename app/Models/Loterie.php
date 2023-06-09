<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loterie extends Model
{
    use HasFactory;
    protected $table = "loteries";
    protected $primaryKey = "id";
    protected $fillable = [
        "nom_lot",
        "quantite_lot",
    ];
    public $timestamps = false;

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
