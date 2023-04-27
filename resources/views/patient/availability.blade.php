<!-- Loop through the list of doctors and their available time slots -->
@foreach($doctors as $doctor)
    <h3>{{ $doctor->name }}</h3>
    @foreach($doctor->availability as $availability)
        <p>{{ $availability->weekday }}: {{ $availability->start_time }} - {{ $availability->end_time }}</p>
    @endforeach
    <hr>
@endforeach