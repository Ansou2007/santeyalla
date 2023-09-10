<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ventilation_Abonnement extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'abonnement_id',
        'date_ventilation',
        'qte',
        'pu',
        'montant',
    ];

    public function abonnements(): BelongsTo
    {
        return $this->belongsTo(Abonnement::class, 'abonnement_id');
    }
}
