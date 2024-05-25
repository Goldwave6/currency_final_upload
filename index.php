<?php
require_once 'db-connect.php';
require_once 'currency_functions.php';




// Get the selected currency from the form (if submitted)
$selectedCurrency = "";
if (isset($_POST["historical_rates"])) {
  $selectedCurrency = $_POST["of_currency"];
} else {
  $selectedCurrency = "USD";
}
$historicalRates = getHistoricalRatesFromDB($selectedCurrency, $conn);

//get the currencies from the currencies table
$currencies = getCurrencies($conn);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />

  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./index.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=ABeeZee:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" />

  <!-- chartJS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
  <div class="wireframe-2">
    <main class="chart-04-parent">
      <!-- chart here  -->
      <section class="chart-04">
        <h2 class="historical-rates">Historical Rates (CHF)</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <label for="of_currency">Select Currency:</label>
          <select id="of_currency" name="of_currency">
            <?php foreach ($currencies as $currency) : ?>
              <?php if ($currency["currency_code"] !== 'CHF') : ?>
                <option value="<?= $currency["currency_code"] ?>"><?= $currency["currency_name"] . ' (' . $currency["currency_code"] . ')' ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
          <button name="historical_rates" type="submit">View Rates</button>
        </form>

        <p id="historicalRatesTitle">Historical Exchange Rates (CHF to <?= $selectedCurrency ?>):</p>
        <canvas id="historicalChart"></canvas>
      </section>


      <section class="frame-section">
        <div class="rectangle-parent">
          <div class="frame-item"></div>
          <img class="litecoin-3-1-icon" loading="lazy" alt="" src="./public/litecoin3-1@2x.png" />

          <h2 class="easy-exchange">Easy Exchange</h2>
        </div>
        <img class="purple-slide-2" alt="" src="./public/purple-slide-2.svg" />

        <div class="background-parent">
          <div class="background"></div>
          <header class="easy-exchange-wrapper">
            <h1 class="easy-exchange1">Easy Exchange</h1>
          </header>
          <div class="check-the-currency-news-worldw-parent">
            <h1 class="check-the-currency">
              Check the currency news worldwide
            </h1>
            <h2 class="rover-the-cursor">
              Get real-time access to the world's best currency exchange rates, helping you make smarter financial decisions with reliable, up to date information
            </h2>
          </div>
          <div class="c-h-f-symbol">
            <div class="frame-div">
              <div class="frame-parent1">
                <div class="hours-wrapper">
                  <b class="hours">24 hours</b>
                </div>
                <h3 class="news-updates">News updates</h3>
              </div>
              <div class="check-currency-wrapper">
                <div class="check-currency">
                  <div class="real-time-wrapper">
                    <h2 class="real-time">Real Time</h2>
                  </div>
                  <h3 class="exchange-data">Exchange Data</h3>
                </div>
              </div>
              <div class="chart-insights-parent">
                <h2 class="chart-insights">Chart Insights</h2>
                <h3 class="detailed-chart-breakdowns">
                  Detailed chart breakdowns
                </h3>
              </div>
            </div>
          </div>
          <div class="frame-wrapper1">
            <div class="frame-parent2">
              <div class="check-and-convert-worldwide-cu-wrapper">
                <h1 class="check-and-convert">
                  Check and convert worldwide currencies
                </h1>
              </div>
              <div class="group-div">
                <div class="people-3-1-parent">
                  <img class="people-3-1-icon" loading="lazy" alt="" src="./public/people3-1@2x.png" />

                  <div class="frame-inner"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="vector-parent">
            <img class="vector-icon" alt="" src="./public/vector-5.svg" />

            <div class="frame-parent3">
              <img class="group-icon" alt="" src="./public/group-20.svg" />

              <img class="frame-child1" alt="" src="./public/vector-1.svg" />

              <img class="frame-child2" alt="" src="./public/vector-2.svg" />
            </div>
            <img class="frame-child3" alt="" src="./public/vector-3.svg" />
          </div>
        </div>

        <!-- currency converter form  -->
        <div class="rectangle-group">

          <form action="" id="currency-converter-form" method="post">
            <div class="currency-select">
              <label for="from-currency">From Currency:</label>
              <select id="from-currency" name="from-currency">
                <?php foreach ($currencies as $currency) : ?>
                  <option value="<?= $currency["currency_code"] ?>"><?= $currency["currency_name"] . " (" . $currency["currency_code"] . ")" ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="currency-select">
              <label for="to-currency">To Currency:</label>
              <select id="to-currency" name="to-currency">
                <?php foreach ($currencies as $currency) : ?>

                  <option value="<?= $currency["currency_code"] ?>"><?= $currency["currency_name"] . " (" . $currency["currency_code"] . ")" ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="amount-input">
              <label for="amount">Amount:</label>
              <input type="number" id="amount" name="amount" min="0" step="0.01" required>
            </div>
            <button type="submit" name="convert" id="convert-button">Convert</button>
          </form>

          <br>
          
            <p id="converted-amount"></p>
          

        </div>

      </section>
    </main>

    <div class="purple-slide-parent">
      <img class="purple-slide-icon" alt="" src="./public/purple-slide.svg" />

      <div class="wrapper-group-6">
        <img class="wrapper-group-6-child" loading="lazy" alt="" src="./public/group-6.svg" />
      </div>
    </div>
    <div class="container2"></div>
    <div class="exchange-area">
      <img class="exchange-area-child" alt="" src="./public/rectangle-11.svg" />

      <h1 class="currency-converter">Currency Converter</h1>
      <h3 class="check-live-rates">
        Check live rates, set rate alerts, receive notifications and more.
      </h3>
    </div>
    <footer class="frame-footer">
      <div class="frame-child8"></div>
      <h2 class="easy-exchange2">Easy Exchange</h2>
    </footer>
  </div>

  <script>
    const ctx = document.getElementById('historicalChart').getContext('2d');
    const historicalRates = <?php echo json_encode($historicalRates); ?>; // Assuming $historicalRates is available

    // Prepare chart data
    const labels = [];
    const data = [];

    historicalRates.forEach(rate => {
      const date = new Date(rate.date);
      labels.push(date.getFullYear()); // Extract year from the date
      data.push(rate.rate);
    });

    const chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: 'CHF to <?php echo $selectedCurrency; ?>',
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          data: data,
          fill: true, // Optionally fill the area under the line
        }]
      },
      options: {
        scales: {
          x: {
            title: 'Year',
            type: 'linear' // Ensure X-axis displays years as numbers (adjust if needed)
          },
          y: {
            title: 'Exchange Rate'
          }
        }
      }
    });
  </script>
  <script>
    $(document).ready(function() {
      $("#currency-converter-form").submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        const fromCurrency = $("#from-currency").val();
        const toCurrency = $("#to-currency").val();
        const amount = $("#amount").val();

        $.ajax({
          url: "convert_currency.php", // Replace with your conversion script
          method: "POST",
          data: {
            from_currency: fromCurrency,
            to_currency: toCurrency,
            amount: amount
          },
          dataType: "json",
          success: function(data) {
            if (data.success) {
              $("#converted-amount").text("Converted amount: " + data.converted_amount + " " + toCurrency);
            } else {
              $("#converted-amount").text("Error: " + data.message);
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error fetching conversion rate:", textStatus, errorThrown);
            $("#converted-amount").text("Error: An unexpected error occurred.");
          }
        });
      });
    });
  </script>


</body>

</html>