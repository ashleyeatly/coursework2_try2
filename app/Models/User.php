<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes for dates.
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'expires'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'administrator',
        'expires',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the direct doors a user has access to.
     */
    public function doors()
    {
        return $this->belongsToMany('App\Models\Door')->withTimestamps();
    }

    /**
     * Get the zones a user has access to.
     */
    public function zones()
    {
        return $this->belongsToMany('App\Models\Zone')->withTimestamps();
    }

    /**
     * Does a user have access to a doors?
     *
     * @param Door $door The doors to check access for.
     * @return boolean True if the user has access to the specified doors.
     */
    public function hasAccessToDoor(Door $door)
    {
        // Check if the user has expired.
        if ($this->expires < Carbon::now()) // https://carbon.nesbot.com/docs/
        {
            return false;
        }

        // Check if the user is admin. If so thrre is no need to check further.
        if($this->administrator)
        {
            return true;
        }

        // Check if the user has direct access to the doors.
        if($this->doors->contains($door))
        {
            return true;
        }

        // Check if any zone the user has access to contains the doors.
        foreach($this->zones as $zone) {
            // Check if doors is in the zone
            if ($zone->doors->contains($door)) {
                return true;
            }
        }

        // We didn't find any access.
        return false;
    }
}
