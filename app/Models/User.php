<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','prenom','email', 'password',
        'tele','status','profile','cinDocument1',
        'cinDocument2','statusDocument','profileDocument',
        'compte','NomCommercial','ville_id','service_id'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relations
    //User has one ville and one service
    public function ville()
    {
        return $this->belongsTo(Ville::class);
    } 

    public function service()
    {
        return $this->belongsTo(service::class);
    } 
   
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }

    public function classment()
    {
        return $this->belongsTo(Classment::class);
    }

    public function demandes(){
        
        return $this->hasMany(demande::class);
    }
    




}
