<?php

namespace App\Models;

use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class PetBoardingCenter extends Authenticatable implements AuthenticatableContract
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable;

    protected $fillable = [
        'business_name',
        'email',
        'phone_number',
        'password',
        'animal_types',
        'city',
        'street_name',
        'postal_code',
        'operating_hours',
        'special_amenities',
        'socialmedia_links',
        'photos',
        'joining_goals',
        'registered_date',
        'price_per_night' // Added this line
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'photos' => 'array', // Cast the photos attribute to an array

    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'boardingcenter_id');
    }

    
    

}
