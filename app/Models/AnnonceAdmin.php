<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnonceAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'centenu', 'image','title'
    ];

}
