<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    use HasFactory;
    protected $table = "unites";
    protected $primaryKey = "id";
    protected $fillable = [
        "nom_unite"
    ];
    public $timestamps = false;

    public function fleurs()
    {
        return $this->hasMany(Fleur::class);
    }
}
