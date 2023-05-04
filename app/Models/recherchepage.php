<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stevebauman\Location\Facades\Location;

class recherchepage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
    ];
    
    public function visits()
    {
        return $this->morphMany(Visitplatforme::class, 'visitplatforme');
    }
    public function recordVisit()
    {
        //$ipAddress = '66.102.0.0';
        //$ipAddress = request()->ip();
        $ipAddress =rand(1, 255).'.'.rand(1, 255).'.'.rand(1, 255).'.'.rand(1, 255);
        $location = Location::get($ipAddress);

        // Get the user agent string from the request headers
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        // Use a regular expression to extract the device type from the user agent string
        $deviceType = 'Unknown';
        if (preg_match('/(Mobile|Tablet|iPad|iPhone|Android)/i', $userAgent)) {
            $deviceType = 'Mobile';
        } else if (preg_match('/(Windows|Macintosh|Linux)/i', $userAgent)) {
            $deviceType = 'PC';
        }
 
        $this->visits()->insert([
            'ip_address' => $ipAddress,
            'country' => $location->countryName ?? '',
            'city' => $location->cityName ?? '',
            'device_type' => $deviceType, 
            'visitplatforme_id' => $this->id,
            'visitplatforme_type' => get_class($this)
        ]);
    }
    public function visitsCount()
    {
        return $this->visits()->count();
    }
}
