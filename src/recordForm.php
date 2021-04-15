<?php
include("connectDB.inc.php");

// If given code exists then assign related id, otherwise exit
if (array_key_exists('code', $_GET) and array_key_exists($_GET['code'], $_SESSION['code'])) {
  $recordId = $_SESSION['code'][$_GET['code']];
} else {
  exit();
}
$properties = array(
  "rain_strength", "sky_description", "snow_strength", "temperature_perception", "weather_description",
  "wind_direction_description", "wind_strength"
);
$list_properties = array();

//Collect all the properties' values form the database
foreach ($properties as $property) {
  $query = "SELECT * FROM $property";
  $mysqliResult = $mysqli->query($query);
  while ($tmp = $mysqliResult->fetch_assoc()) {
    $list_properties[$property][$tmp["$property" . "_id"]] = $tmp["$property"];
  }
}

// If the record exists, obtain its values
if ($recordId > 0) {
  $query = "SELECT * FROM record WHERE record_id=?";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param('i', $recordId);
  $stmt->execute();
  $stmt->bind_result(
    $record_id,
    $temperature,
    $heat_index,
    $wind_speed,
    $solar_irradiance,
    $air_pollution,
    $absolute_humidity,
    $relative_humidity,
    $atmospheric_pressure,
    $cloud_cover,
    $accumulated_evaporation,
    $accumulated_precipitation,
    $date,
    $time,
    $weather_description_id,
    $temperature_perception_id,
    $sky_description_id,
    $wind_direction_description_id,
    $wind_strength_id,
    $rain_strength_id,
    $snow_strength_id,
    $validRecord
  );
  $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data form</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" type="text/css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <style>
    body {
      text-align: center;
    }

    .inp {
      padding: 1%;
    }
  </style>
</head>

<body>

  <h1>Data Form</h1>

  <form class="form-horizontal" action="recordFormUpdate.php" method="post">

    <input type="hidden" name="code" value="<?php echo $_GET['code']; ?>">


    <div class="py-3 d-flex flex-column justify-content-center" style="text-align:start;">
      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="control-label col-lg-2" for="date">Date</label>
        <input type="date" class="col-lg-2" name="date" id="date" <?php echo (isset($date)) ? ' value="' . htmlentities($date) . '"' : ' value=' . htmlentities(date("Y-m-d")); ?> >

      </div>

      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="time">Time</label>
        <input class="col-lg-2" type="time" name="time" id="time" <?php echo (isset($time)) ? ' value=' . htmlentities(date('H:i', strtotime($time))) . '' : ' value=' . htmlentities(date("H:i")); ?> >

      </div>
      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="temperature">Temperature (&#8451;)</label>
        <input class="col-lg-2" type="number" name="temperature" id="temperature" <?php echo (isset($temperature)) ? ' value="' . htmlentities($temperature) . '"' : ' value="0"'; ?> min="-90" max="90" step="0.01">

      </div>

      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="heat_index">Heat Index (Real feel, &#8451;)</label>
        <input class="col-lg-2" type="number" name="heat_index" id = "heat_index" <?php echo (isset($heat_index)) ? ' value="' . htmlentities($heat_index) . '"' : ' value="0"'; ?> min="-90" max="90" step="0.01">

      </div>

      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="wind_speed">Wind Speed (km/h)</label>
        <input class="col-lg-2" type="number" name="wind_speed" id = "wind_speed" <?php echo (isset($wind_speed)) ? ' value="' . htmlentities($wind_speed) . '"' : ' value="0"'; ?> min="0" max="200" step="0.1">

      </div>

      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="solar_irradiance">Solar Irradiance (kW/m^2)</label>
        <input class="col-lg-2" type="number" name="solar_irradiance" id = "solar_irradiance" <?php echo (isset($solar_irradiance)) ? ' value="' . htmlentities($solar_irradiance) . '"' : ' value="1.6"'; ?> min="0" max="20" step="0.01">
      </div>


      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="air_pollution">Air Pollution (AQI)</label>
        <input class="col-lg-2" type="number" name="air_pollution" id =  "air_pollution" <?php echo (isset($air_pollution)) ? ' value="' . htmlentities($air_pollution) . '"' : ' value="55"'; ?> min="0" max="600" step="1">

      </div>

      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="absolute_humidity">Absolute Humidity (g/m^3)</label>
        <input class="col-lg-2" type="number" name="absolute_humidity" id = "absolute_humidity" <?php echo (isset($absolute_humidity)) ? ' value="' . htmlentities($absolute_humidity) . '"' : ' value="0"'; ?> min="0" max="50" step="0.01">

      </div>

      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="relative_humidity">Relative Humidity (%)</label>
        <input class="col-lg-2" type="number" name="relative_humidity" id = "relative_humidity" <?php echo (isset($relative_humidity)) ? ' value="' . htmlentities($relative_humidity) . '"' : ' value="0"'; ?> min="0" max="100" step="0.01">

      </div>


      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="atmospheric_pressure">Atmospheric Pressure (mmHg)</label>
        <input class="col-lg-2" type="number" name="atmospheric_pressure" id = "atmospheric_pressure" <?php echo (isset($atmospheric_pressure)) ? ' value="' . htmlentities($atmospheric_pressure) . '"' : ' value="760"'; ?> min="0" max="1000" step="0.1">
      </div>

      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="cloud_cover">Cloud Cover (%)</label>
        <input class="col-lg-2" type="number" name="cloud_cover" id = "cloud_cover" <?php echo (isset($cloud_cover)) ? ' value="' . htmlentities($cloud_cover) . '"' : ' value="0"'; ?> min="0" max="100" step="1">
      </div>

      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="accumulated_evaporation">Accumulated Evaporation (mm/day)</label>
        <input class="col-lg-2" type="number" name="accumulated_evaporation" id = "accumulated_evaporation" <?php echo (isset($accumulated_evaporation)) ? ' value="' . htmlentities($accumulated_evaporation) . '"' : ' value="0"'; ?> min="0" max="100" step="0.01">
      </div>

      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="relative_humidity">Accumulated Precipitation (mm/day)</label>
        <input class="col-lg-2" type="number" name="accumulated_precipitation" id = "accumulated_precipitation" <?php echo (isset($accumulated_precipitation)) ? ' value="' . htmlentities($accumulated_precipitation) . '"' : ' value="0"'; ?> min="0" max="100" step="0.01">
      </div>

      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="weather_description">Weather Description</label>
        <select class="col-lg-2" name="weather_description" id="weather_description" size="1">
          <?php
          foreach ($list_properties['weather_description'] as $propId => $propValue) {
            echo "<option value=\"$propId\"";
            // In case we are editing existing data, show its previous value as selected
            if (isset($weather_description_id) and $weather_description_id == $propId) echo " selected";
            echo ">$propValue</option>\n";
          }
          ?>
        </select>
      </div>

      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="sky_description">Sky Description</label>
        <select class="col-lg-2" name="sky_description" id="sky_description" size="1">
          <?php
          foreach ($list_properties['sky_description'] as $propId => $propValue) {
            echo "<option value=\"$propId\"";
            if (isset($sky_description_id) and $sky_description_id == $propId) echo " selected";
            echo ">$propValue</option>\n";
          }
          ?>
        </select>
      </div>

      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="wind_direction">Wind Direction</label>
        <select class="col-lg-2" name="wind_direction" id = "wind_direction" size="1">
          <?php
          foreach ($list_properties['wind_direction_description'] as $propid => $propvalue) {
            echo "<option value=\"$propid\"";
            if (isset($wind_direction_description_id) and $wind_direction_description_id == $propid) echo " selected";
            echo ">$propvalue</option>\n";
          }
          ?>
        </select>
      </div>

      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="rain_strength">Rain strength </label>
        <select class="col-lg-2" name="rain_strength" id="rain_strength" size="1">
          <?php
          foreach ($list_properties['rain_strength'] as $propid => $propvalue) {
            echo "<option value=\"$propid\"";
            if (isset($rain_strength_id) and $rain_strength_id == $propid) echo " selected";
            echo ">$propvalue</option>\n";
          }
          ?>
        </select>
      </div>

      <div class="d-flex flex-row flex-wrap justify-content-center inp">
        <label class="col-lg-2" for="snow_strength">Snow strength</label>
        <select class="col-lg-2" name="snow_strength" id="snow_strength" size="1">
          <?php
          foreach ($list_properties['snow_strength'] as $propid => $propvalue) {
            echo "<option value=\"$propid\"";
            if (isset($snow_strength_id) and $snow_strength_id == $propid) echo " selected";
            echo ">$propvalue</option>\n";
          }
          ?>
        </select>
      </div>

    </div>
    <button class="my-3 col-lg-1 btn btn-success btn-lg">Send</button>
  </form>
</body>

</html>