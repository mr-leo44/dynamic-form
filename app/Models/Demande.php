<?php

namespace App\Models;

use App\Models\User;
use App\Models\DemandeDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demande extends Model
{
    use HasFactory;
    protected $fillable = [
        'num_demande',
        'service_id',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function demande_details(){
        return $this->hasMany(DemandeDetail::class);
    }
}
