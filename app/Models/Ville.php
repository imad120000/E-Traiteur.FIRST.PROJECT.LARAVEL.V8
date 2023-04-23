<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ville extends Model
{
    use HasFactory;

    //ville has multi user
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function annonces()
    {
        return $this->hasMany(Annonce::class);
    }


}
