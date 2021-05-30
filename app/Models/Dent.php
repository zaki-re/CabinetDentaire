<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dent extends Model
{
    use HasFactory;
    protected $fillable = [
        'dent',
        'numero',
        'emplacement',
    ];
}
