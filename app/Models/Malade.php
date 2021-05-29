<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Malade extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_de_consultation',
    ];

    public function medecin(){
        return $this->hasMany(Medecin::class);
    }
}
