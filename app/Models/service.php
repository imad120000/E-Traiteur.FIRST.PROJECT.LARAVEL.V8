<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
    //service has multi user
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function annonces()
    {
        return $this->hasMany(Annonce::class);
    }
    
    public function classments()
    {
        return $this->hasMany(Classment::class);
    }

}
