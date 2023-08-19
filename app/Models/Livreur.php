<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Livreur extends Model
{
    use HasFactory;
    protected $fillable =
    [
        "matricule",
        "structure_id",
        "prenom",
        "nom",
        "telephone",
        "adresse",
        "typePiece",
        "numeroPiece",
        "photo",
    ];

    public function structures()
    {
        return $this->belongsTo(Structure::class, 'structure_id');
    }
}
