<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    // Define the relationship between Appointment and User as a Doctor
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    // Define the relationship between Appointment and User as a Patient
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
