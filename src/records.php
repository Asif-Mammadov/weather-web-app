
<?php
include("connectDB.inc.php");
$_SESSION['code']=array();
$query="SELECT record.record_id, record.temperature, record.heat_index, record.wind_speed, record.relative_humidity, record.date, record.time, sky_description.sky_description, wind_direction_description.wind_direction_description from record INNER JOIN sky_description ON (record.sky_description_id = sky_description.sky_description_id)
INNER JOIN wind_direction_description on (record.wind_direction_description_id = wind_direction_description.wind_direction_description_id) WHERE record.validRecord=1 ORDER BY date DESC, time DESC";
$mysqliResult=$mysqli->query($query);
$recordList = array();
while($var=$mysqliResult->fetch_assoc()){
  $var['time'] = date("g:i a", strtotime($var['time']));
  $var['date'] = date("d/m/Y", strtotime($var['date']));  
  $recordList[$var['record_id']] = new Record($var['temperature'], $var['heat_index'], $var['wind_speed'], $var['relative_humidity'], $var['sky_description'], $var['wind_direction_description'], $var['date'], $var['time'] );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Records list</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" type="text/css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#dtable').DataTable({
        "order": []
    });
    } );
  </script>
</head>


<body class ="p-3">
<nav>
<?php
$code=random_key(10);
$_SESSION['code'][$code]=0;
?>
<div class= "d-flex justify-content-between">
  <a class="btn btn-danger btn-lg" href="homepage.php">Back</a>
  <a class="btn btn-success btn-lg" href="recordForm.php?code=<?php echo $code; ?>">New</a>
</div>
</nav>
<div class = "table-responsive container">

<table  id="dtable" class="table table-striped table-bordered" >
<thead class = "thead-dark">
  <tr>
    <th>Date</th>
    <th>Time</th>
    <th>Temperature</th>
    <th>Feels like</th>
    <th>Humidity</th>
    <th>Wind Speed</th>
    <th>Wind Direction</th>
    <th>Edit</th>
    <th>Del.</th>
  </tr>
</thead>
<tbody>
<?php
foreach ($recordList as $recordId => $record){
  $code = random_key(10);
  $_SESSION['code'][$code] = $recordId;
  echo "<tr><td>"
    .$record->date."</td><td>"
    .$record->time."</td><td>"
    .$record->temperature."</td><td>"
    .$record->heat_index."</td><td>"
    .$record->relative_humidity."</td><td>"
    .$record->wind_speed."</td><td>"
    .$record->wind_direction_description."</td>"
    ."<td><a href=\"recordForm.php?code=$code\">Edit</a></td>"
    ."<td><a href=\"recordDelete.php?code=$code\">Del</a></td>"
    ."</tr>";
}
?>
</tbody>
</table>
</div>

</body>
</html>

<?php

class Record{
  public $temperature;
  public $heat_index;
  public $wind_speed;
  public $relative_humidity;
  public $sky_description;
  public $wind_direction_description;
  public $date;
  public $time;
  public function __construct($temperature, $heat_index, $wind_speed, $relative_humidity, $sky_description, $wind_direction_description, $date, $time){
    $this->temperature = $temperature;
    $this->heat_index = $heat_index;
    $this->wind_speed = $wind_speed;
    $this->relative_humidity = $relative_humidity;
    $this->sky_description = $sky_description;
    $this->wind_direction_description = $wind_direction_description;
    $this->date = $date;
    $this->time = $time;
  }
}

?>
