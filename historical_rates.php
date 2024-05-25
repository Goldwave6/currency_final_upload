<?php
require_once 'db-connect.php';

$selectedCurrency = "";
if (isset($_GET["to_currency"])) {
  $selectedCurrency = $_GET["to_currency"];
}

// Prepare the SQL query to retrieve historical rates (if a currency is selected)
if ($selectedCurrency != "") {
  $sql = "SELECT date, conversion_rate FROM Historical_Rates WHERE from_currency = 'CHF' AND to_currency = '$selectedCurrency' ORDER BY date DESC";
  $result = $conn->query($sql);

  // Prepare data for the chart
  $historicalRates = [];
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $historicalRates[] = array(
        "date" => $row["date"],
        "rate" => $row["conversion_rate"]
      );
    }
  } else {
    echo "No historical rates found for CHF to $selectedCurrency";
  }
} else {
  echo "Error: No currency selected";
}

$conn->close();

// Output historical rates as JSON for the chart
echo json_encode($historicalRates);

?>
