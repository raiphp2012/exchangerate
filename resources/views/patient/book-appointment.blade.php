<form action="{{ route('patient.bookAppointment', $doctorId) }}" method="post">
    @csrf
    <label for="appointment_date">Appointment Date</label>
    <input type="date" name="appointment_date" id="appointment_date" required>

    <label for="time_slot">Time Slot</label>
    <select name="time_slot" id="time_slot" required>
        <!-- Loop through the available time slots for the selected doctor -->
        @foreach($doctor->availability as $availability)
            <option value="{{ $availability->id }}">{{ $availability->weekday }}: {{ $availability->start_time }} - {{ $availability->end_time }}</option>
        @endforeach
    </select>

    <button type="submit">Book Appointment</button>
</form>