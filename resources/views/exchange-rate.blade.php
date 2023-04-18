<!-- exchange-rate.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Exchange Rate</title>
</head>
<body>
    <h1>Current Exchange Rate: {{ $currentRate }}</h1>
    <h2>Exchange Rate History:</h2>
    <ul>
        @foreach($exchangeRateHistory as $rate)
            <li>{{ $rate }}</li>
        @endforeach
    </ul>
</body>
</html>