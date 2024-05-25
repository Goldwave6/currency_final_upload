<?php
$API_KEY = 'fca_live_XvG3tfZCgnD1I4zu5jjaUw6E7Bj8S0wvzOLC43SM';

//function to get the latest exchange rates 
function getLatestRates($base_currency)
{
    $url = 'https://api.freecurrencyapi.com/v1/latest?apikey=' . $GLOBALS['API_KEY'] . '&base_currency=' . $base_currency;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
}

function getHistoricalRates($base_currency, $date)
{
    $url = 'https://api.freecurrencyapi.com/v1/historical?apikey=' . $GLOBALS['API_KEY'] . '&base_currency=' . $base_currency . '&date=' . $date;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
}