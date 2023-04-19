<?php

namespace App\Http\Controllers;

use App\ExchangeRate;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{
    public function index()
    {
        // Set your API key
        $apiKey = 'yCSXjsFhONQ5pjDNc9py2uOIzLeqnq1o';
        // Make API request to get the latest exchange rate
        $client = new Client();
        $response = $client->get('https://api.apilayer.com/exchangerates_data/latest?base=INR&symbols=EUR',[
            'headers' => [
                'apikey' => $apiKey,
            ],
        ]);
        $data = json_decode($response->getBody(), true);
        //dd($data);
        $currentRate=0.00;
        if(array_key_exists('rates',$data)){
            $currentRate = $data['rates']['EUR'];

        }
        // Save the current exchange rate in the database as the latest rate
        ExchangeRate::create([
            'rate' => $currentRate
        ]);

        // Get the exchange rate history
        $exchangeRateHistory = ExchangeRate::orderBy('created_at', 'desc')->pluck('rate');

        return view('exchange-rate', compact('currentRate', 'exchangeRateHistory'));
    }
}
