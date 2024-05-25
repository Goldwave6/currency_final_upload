<?php
require_once 'api.php';


function saveConversionRate($fromCurrency, $toCurrency, $conn)
{
    $rates = getLatestRates($fromCurrency);
    if ($rates) {
        $conversionRate = $rates['data'][$toCurrency];
        $sql = "INSERT INTO conversion_rates (from_currency, to_currency, conversion_rate) VALUES ('$fromCurrency', '$toCurrency', $conversionRate)";
        $conn->query($sql);
    }
}

function saveHistoricalRates($fromCurrency, $toCurrency, $conn)
{
    $dates = ['2023-12-31', '2022-12-31', '2021-12-31', '2020-12-31', '2019-12-31', '2018-12-31', '2017-12-31'];
    foreach ($dates as $date) {
        $rates = getHistoricalRates($fromCurrency, $date);
        $toCurrencies = getCurrencies($conn);

        foreach ($toCurrencies as $toCurrency) {
            $toCurrency = $toCurrency['currency_code'];
            $conversionRate = $rates['data'][$date][$toCurrency];
            $sql = "INSERT INTO historical_rates (from_currency, to_currency, conversion_rate, date) VALUES ('$fromCurrency', '$toCurrency', '$conversionRate', '$date')";
            $conn->query($sql);
        }
    }
}

function getConversionRate($fromCurrency, $toCurrency, $conn)
{
    $sql = "SELECT conversion_rate FROM conversion_rates WHERE from_currency = '$fromCurrency' AND to_currency = '$toCurrency'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["conversion_rate"];
    } else {
        saveConversionRate($fromCurrency, $toCurrency, $conn);
        getConversionRate($fromCurrency, $toCurrency, $conn);
    }
}

function getCurrencies($conn)
{
    $sql = "SELECT currency_code, currency_name FROM currencies";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result;
    }

    return false;
}

function getHistoricalRatesFromDB($toCurrency, $conn)
{
    $sql = "SELECT date, conversion_rate FROM historical_rates WHERE from_currency = 'CHF' AND to_currency = '$toCurrency' ORDER BY date DESC";
    $result = $conn->query($sql);

    // Prepare data for the chart (replace with your chart library logic)
    $historicalRates = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $historicalRates[] = array(
                "date" => $row["date"],
                "rate" => $row["conversion_rate"]
            );
        }
        return $historicalRates;
    } else {
        saveHistoricalRates('CHF', $toCurrency,  $conn);
        getHistoricalRatesFromDB($toCurrency,  $conn);
    }
}
