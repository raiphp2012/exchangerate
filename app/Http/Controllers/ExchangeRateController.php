<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRate;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{
    public function index()
    {
        // Make API request to get the latest exchange rate
        $client = new Client();
        $response = $client->get('https://api.exchangeratesapi.io/latest?base=INR&symbols=EUR');
        $data = json_decode($response->getBody(), true);
        $currentRate = $data['rates']['EUR'];

        // Save the current exchange rate in the database as the latest rate
        ExchangeRate::create([
            'rate' => $currentRate
        ]);

        // Get the exchange rate history
        $exchangeRateHistory = ExchangeRate::orderBy('created_at', 'desc')->pluck('rate');

        return view('exchange-rate', compact('currentRate', 'exchangeRateHistory'));
    }
}
