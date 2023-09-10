<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Abonnement extends Model
{
    use HasFactory;

    protected $fillable = [
        "structure_id",
        "date_abonnement",
        "prenom",
        "nom",
        "telephone",
    ];

    public function structures(): BelongsTo
    {
        return $this->belongsTo(Structure::class, 'structure_id');
    }
}
