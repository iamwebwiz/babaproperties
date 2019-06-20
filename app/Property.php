<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = [];

    public function applicants()
    {
        return $this->belongsToMany(User::class, 'interests', 'property_id', 'user_id');
    }
}
