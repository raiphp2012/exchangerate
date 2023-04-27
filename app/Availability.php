<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    // Define the relationship between Availability and User
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
