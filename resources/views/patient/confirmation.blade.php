<h3>Appointment Booked</h3>
<p>Doctor: {{ $doctor->name }}</p>
<p>Appointment Date: {{ $appointment->appointment_date }}</p>
<p>Time Slot: {{ $appointment->availability->weekday }}: {{ $appointment->availability->start_time }} - {{ $appointment->availability->end_time }}</p>