<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = [];

    public function getTypeAttribute($value)
    {
        switch ($value) {
            case 'bungalow':
                return 'Bungalow';
                break;
            case 'flat':
                return 'Flat';
                break;
            case 'self_contained':
                return 'Self Contained';
                break;
            case 'storey_building':
                return 'Storey Building';
                break;
            case 'duplex':
                return 'Duplex';
                break;
            case 'office_space':
                return 'Office Space';
                break;
            case 'event_centre':
                return 'Event Centre';
                break;

            default:
                return $value;
                break;
        }
    }

    public function applicants()
    {
        return $this->belongsToMany(User::class, 'interests', 'property_id', 'user_id')
            ->withTimestamps();
    }

    public function tenant()
    {
        return $this->belongsTo(User::class);
    }
}
