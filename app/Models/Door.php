<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
    use HasFactory;

    /**
     * Get the zone that this doors belongs to.
     */
    public function zone()
    {
        return $this->belongsTo('App\Models\Zone');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }
}
