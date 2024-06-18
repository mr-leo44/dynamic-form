<?php

namespace App\Models;

use App\Models\Demande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemandeDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation',
        'qte_demandee',
        'qte_livree',
        'demande_id'
    ];

    public function demande(){
        return $this->belongsTo(Demande::class);
    }
}
