<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ventilation extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'date_ventilation',
        'ventile',
        'non_ventile',
        'retour',
        'pu',
        'location',
        'montant_verse',
        'qte_vendue',
        'montant_a_verse',
        'reliquat',
        'livreur_id'
    ];


    public function livreurs(): BelongsTo
    {
        return $this->belongsTo(Livreur::class, 'livreur_id');
    }
}
