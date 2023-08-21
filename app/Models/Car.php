<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function mechanic()
    {
        return $this->belongsTo(Mechanic::class);
    }

    public function owner()
    {
        return $this->hasOne(Owner::class);
    }

    public function ownerThroughMechanic()
    {
        return $this->hasOneThrough(Owner::class, Mechanic::class, 'id', 'car_id', 'mechanic_id');
    }
}
