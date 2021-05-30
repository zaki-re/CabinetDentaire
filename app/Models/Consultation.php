<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_medecin',
        'id_malade',
        'date_consultation',
        'date_prochaine_rdv',
        'dent_num',
        'type_consultation',
        'soins',
        'versement',
        'rest',

    ];
}
