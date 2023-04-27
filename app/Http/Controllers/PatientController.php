<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Get available time slots for a specific weekday
    public function getAvailability(Request $request, $weekday)
    {
        // Validation logic for the request data
        // ...

        // Find the doctors who have availability on the given weekday
        $doctors = User::where('role', 'doctor')
            ->whereHas('availability', function ($query) use ($weekday) {
                $query->where('weekday', $weekday);
            })
            ->get();

        // Return the list of doctors with their available time slots
        return view('patient.availability', ['doctors' => $doctors]);
    }

    // Book an appointment with a doctor
    public function bookAppointment(Request $request, $doctorId)
    {
        // Validation logic for the request data
        // ...

        // Get the authenticated user (patient)
        $patient = Auth::user();

        // Create a new appointment
        $appointment = new Appointment([
            'doctor_id' => $doctorId,
            'patient_id' => $patient->id,
            'appointment_date' => $request->input('appointment_date'),
            'time_slot' => $request->input('time_slot')
        ]);
        $appointment->save();

        // Redirect or return response
        // ...
    }
}
