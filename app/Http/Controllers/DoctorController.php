<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // Save available time slots for a specific weekday
    public function saveAvailability(Request $request)
    {
        // Validation logic for the request data
        // ...

        // Get the authenticated user (doctor)
        $doctor = Auth::user();

        // Save the availability in the database
        $availability = new Availability([
            'doctor_id' => $doctor->id,
            'weekday' => $request->input('weekday'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time')
        ]);
        $availability->save();

        // Redirect or return response
        // ...
    }

    public function updateAvailability(Request $request, $doctorId)
    {
        // Retrieve the doctor and the updated availability from the request
        $doctor = Doctor::findOrFail($doctorId);
        $weekday = $request->input('weekday');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');

        // Update the doctor's availability for the specific weekday
        $availability = $doctor->availability->where('weekday', $weekday)->first();
        $availability->update([
            'start_time' => $start_time,
            'end_time' => $end_time
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Availability updated successfully!');
    }  


}
