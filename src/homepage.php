<?php
include("connectDB.inc.php");

// Extract the last 6 rows from the database.
// The latest will be on the front. Other 5 will be displayed as recent records in mini table on the left.
$query = "SELECT record.record_id, record.temperature, record.heat_index, record.wind_speed, record.relative_humidity, record.date, record.time, sky_description.sky_description, wind_direction_description.wind_direction_description, temperature_perception.temperature_perception from record 
  INNER JOIN sky_description ON (record.sky_description_id = sky_description.sky_description_id)
INNER JOIN wind_direction_description on (record.wind_direction_description_id = wind_direction_description.wind_direction_description_id) 
INNER JOIN temperature_perception ON (record.temperature_perception_id = temperature_perception.temperature_perception_id) 
WHERE record.validRecord=1 ORDER BY date DESC, time DESC LIMIT 6";

$mysqliResult = $mysqli->query($query);
$recordList = array();
$i = 0;
while ($var = $mysqliResult->fetch_assoc()) {
  $var['time'] = date("H:i", strtotime($var['time']));
  $var['date'] = date("d/m/Y", strtotime($var['date']));
  // The last value (returned first) will be shown on the front top part
  if ($i == 0) {
    $lastRecord = new Record($var['record_id'], $var['temperature'], $var['heat_index'], $var['wind_speed'], $var['relative_humidity'], $var['sky_description'], $var['wind_direction_description'], $var['date'], $var['time'], $var['temperature_perception']);
  } // Others will be displayed on the mini table 
  else {
    $recordList[] = new Record($var['record_id'], $var['temperature'], $var['heat_index'], $var['wind_speed'], $var['relative_humidity'], $var['sky_description'], $var['wind_direction_description'], $var['date'], $var['time'], $var['temperature_perception']);
  }
  $i++;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Main page</title>

  <!-- Include Bootstrap-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- Include Chartjs-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
  <style>
    .lev2 {
      padding: 1%;
    }
    .lastRecord {
      background-color: #A4D1FB;
    }
  </style>
</head>

<body>

  <!-- Last record part (on the top) -->
  <div class="lastRecord container-fluid py-5" style="text-align:center;">
    <h1>Baku</h1>
    <h3> <?php echo "" . round($lastRecord->temperature) . " &#8451;" ?></h3>
    <div class="flex-d justify-content-center">
      <span class="lev2"> Feels <?php echo "" . round($lastRecord->heat_index) . " &#8451;" ?></span>
      <span class="lev2"> <?php echo ucwords($lastRecord->sky_description) ?></span>
      <span class="lev2"><?php echo ($lastRecord->wind_speed != 0) ? "" . round($lastRecord->wind_speed) . " km/h (" . $lastRecord->wind_direction_description . ")" : "No wind" ?></span>
    </div>
    <p> Updated <?php echo "$lastRecord->time" . " $lastRecord->date" ?>
  </div>
  <div class="lower-part d-flex flex-row p-3 flex-wrap">
    <!-- Mini table part -->
    <div class="px-3 pt-2 bd-highlight col-lg-6">
      <div class="container">
        <table id="dtable" class="display table table-borderless">
          <thead class="thead-dark">
            <tr>
              <th>Date</th>
              <th>Time</th>
              <th>Temp</th>
              <th>Feels like</th>
              <th>Wind Speed</th>
              <th>Wind Direction</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($recordList as $recordId => $record) {
              echo "<tr><td>"
                . $record->date . "</td><td>"
                . $record->time . "</td><td>"
                . $record->temperature . "</td><td>"
                . $record->heat_index . "</td><td>"
                . $record->wind_speed . "</td><td>"
                . $record->wind_direction_description . "</td>"
                . "</tr>";
            }
            ?>
          </tbody>
        </table>
        <a href="records.php" class="btn btn-primary">View all</a>
      </div>
    </div>
    <!-- Graph part -->
    <div class="px-3 pt-2 bd-highlight col-lg-6 ">
      <canvas id="tempChart"></canvas>
    </div>
  </div>

</body>

<?php
$query = "SELECT record.record_id, record.temperature, record.heat_index, record.wind_speed, record.relative_humidity, record.date, record.time from record WHERE record.validRecord=1 ORDER BY date ASC, time ASC";
$mysqliResult = $mysqli->query($query);
$_recordList = array();
while ($var = $mysqliResult->fetch_assoc()) {
  $var['time'] = date("H:i", strtotime($var['time']));
  $var['date'] = date("Y-m-d", strtotime($var['date']));
  $_recordList[] = $var;
}
?>

<script>
  var ctx = document.getElementById('tempChart').getContext('2d');
  var myChart = new Chart(ctx, {
    maintainAspectRatio: false,
    responsive: true,
    type: 'line',
    data: {
      datasets: [{
        label: 'Temperature',
        borderColor: 'rgb(255,140,0,1)',
        fill: true,
        backgroundColor: 'rgb(255,140,0,0.1)',
        borderWidth: 2,
        data: [
          <?php
          //Find minimum and maximum of the given data to adjust the graph's borders
          $min = 999;
          $max = -999;
          foreach ($_recordList as $index => $record) {
            if ($record['temperature'] < $min) $min = $record['temperature'];
            if ($record['temperature'] > $max) $max = $record['temperature'];
            echo "{t: new Date('" . $record['date'] . " " . $record['time'] . "'), y: " . $record['temperature'] . "},";
          }
          ?>
        ],
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        xAxes: [{
          type: 'time',
        }],
        yAxes: [{
          ticks: {
            //Adjust borders
            min: <?php echo $min - 5 ?>,
            max: <?php echo $max + 5 ?>,
          }
        }]
      }
    }
  });
</script>

</html>

<?php

class Record
{
  public $recordId;
  public $temperature;
  public $heat_index;
  public $wind_speed;
  public $relative_humidity;
  public $sky_description;
  public $wind_direction_description;
  public $date;
  public $time;
  public $temperature_perception;
  public function __construct($recordId, $temperature, $heat_index, $wind_speed, $relative_humidity, $sky_description, $wind_direction_description, $date, $time, $temperature_perception)
  {
    $this->recordId = $recordId;
    $this->temperature = $temperature;
    $this->heat_index = $heat_index;
    $this->wind_speed = $wind_speed;
    $this->relative_humidity = $relative_humidity;
    $this->sky_description = $sky_description;
    $this->wind_direction_description = $wind_direction_description;
    $this->date = $date;
    $this->time = $time;
    $this->temperature_perception = $temperature_perception;
  }
}

?>
