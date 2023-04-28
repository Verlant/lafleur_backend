<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $table = "adresses";
    protected $primaryKey = "id";
    protected $fillable = [
        "rue",
        "date_creation",
        "date_modif",
        "ville_id",
        "code_postal_id",
    ];
    public $timestamps = false;

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function codePostal()
    {
        return $this->belongsTo(CodePostal::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
