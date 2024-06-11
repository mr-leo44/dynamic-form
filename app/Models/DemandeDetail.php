<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation',
        'qte_demandee',
        'qte_livree',
        'demande_id'
    ];
}
