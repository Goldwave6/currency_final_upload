<?php

require_once 'db-connect.php';
require_once 'currency_functions.php';

// Get form data
$fromCurrency = $_POST["from_currency"];
$toCurrency = $_POST["to_currency"];
$amount = $_POST["amount"];

// Replace with your actual conversion logic
// Check if conversion rate exists in database
$conversionRate = getConversionRate($fromCurrency, $toCurrency, $conn);

if ($conversionRate !== false) {
  $convertedAmount = $amount * $conversionRate;
  $convertedAmount = number_format($convertedAmount, 2, '.', ''); // Format to two decimal places
  echo json_encode(array("success" => true, "converted_amount" => $convertedAmount)); // Encode JSON response for AJAX
} else {
    echo json_encode(array("success" => false, "message" => "Conversion rate not found for $fromCurrency to $toCurrency"));
}