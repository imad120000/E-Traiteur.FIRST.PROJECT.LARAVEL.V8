<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Awssat\Visits\Visits;

class visit extends Model
{
    use HasFactory;
    use Visits;

    public function annonce(){

        return $this->belongsTo(Annonce::class);
    }

    public function user(){
      
        return $this->belongsTo(user::class);

    }

    protected $fillable = [
        'annonce_id', 'user_id',
    ];
}
