<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    /**
     * Get the doors in this zone.
     */
    public function doors()
    {
        return $this->hasMany('App\Models\Door');
    }

    /**
     * Get the doors in this zone.
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }
}
