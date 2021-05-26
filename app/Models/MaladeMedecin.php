<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaladeMedecin extends Model
{
    use HasFactory;
    protected $table = 'malade_medecin';

    protected $fillable = [
        'id_malade',
        'id_medecin',
    ];

}
