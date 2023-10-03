<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Petrin extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'structure_id',
        'nbre_sac',
        'rendement',
        'qte_produit',
        'date_petrin',
        'status'
    ];

    public function structures(): BelongsTo
    {
        return $this->belongsTo(Structure::class, 'structure_id');
    }
}
