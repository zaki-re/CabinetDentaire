<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeConsultationMalade extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_medecin',
        'id_malade',
        'id_consultation',

    ];
}
