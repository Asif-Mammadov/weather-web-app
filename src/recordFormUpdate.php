<?php
include("connectDB.inc.php");

// Give appropriate scale of temperature_perception according to temperature
function find_temperature_perception($temperature){
  $value = 0;
  if($temperature > 35) $value = 1; //Boiling hot
  else if($temperature > 25) $value = 2; // Hot
  else if($temperature > 18) $value = 3; // Warm
  else if($temperature > 10) $value = 4; // Mild
  else if($temperature > 5) $value = 5; // Cool
  else if($temperature > 2) $value = 6; // Chilly
  else if($temperature > -1) $value = 7; // Cold
  else if($temperature > -3) $value = 8; // Freezing
  else if($temperature > -5) $value = 9; // Icy
  else if($temperature > -10) $value = 10; // Frosty
  else if($temperature > -25) $value = 11; //Very cold
  else $value = 12; // Bitterly cold 
  return $value;
}
// Give appropriate scale of wind_strength according to wind speed
function find_wind_strength($wind_speed){
  $value = 0;
  if($wind_speed > 100) $value = 8; // Hurricane
  else if($wind_speed > 60) $value = 7; // Storm
  else if($wind_speed > 30) $value = 6; // Strong
  else if($wind_speed > 15) $value = 5; // Moderate
  else if($wind_speed > 10) $value = 4; // Gentle
  else if($wind_speed > 5) $value = 3; // Light
  else if($wind_speed > 1) $value = 2; // Light air
  else $value = 1; // Calm
  return $value;
}
// Check if code exists and assign related id
if(array_key_exists('code', $_POST) and array_key_exists($_POST['code'], $_SESSION['code'])){
  $recordId = $_SESSION['code'][$_POST['code']];	
} else {
	exit();
}

$_POST['temperature_perception'] = find_temperature_perception($_POST['temperature']);
$_POST['wind_strength'] = find_wind_strength($_POST['wind_speed']);

// Insert new value (in case of New button pressed)
if($recordId == 0){
try {
$query="INSERT INTO record (record_id , temperature, heat_index, wind_speed, solar_irradiance, air_pollution,
absolute_humidity, relative_humidity, atmospheric_pressure, cloud_cover, accumulated_evaporation, accumulated_precipitation,
date, time, weather_description_id, temperature_perception_id, sky_description_id, wind_direction_description_id,
wind_strength_id, rain_strength_id, snow_strength_id, validRecord) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1)";

$stmt=$mysqli->prepare($query);	
  $stmt->bind_param("ddddidididdssiiiiiii", $_POST['temperature'], $_POST['heat_index'], $_POST['wind_speed'], $_POST['solar_irradiance'], 
  $_POST['air_pollution'], $_POST['absolute_humidity'], $_POST['relative_humidity'], $_POST['atmospheric_pressure'], 
  $_POST['cloud_cover'], $_POST['accumulated_evaporation'], $_POST['accumulated_precipitation'], $_POST['date'], $_POST['time'], 
  $_POST['weather_description'], $_POST['temperature_perception'], $_POST['sky_description'], $_POST['wind_direction'], 
  $_POST['wind_strength'], $_POST['rain_strength'], $_POST['snow_strength']);
  $stmt->execute();
} catch (Exception $e) {
  echo "MySQLi Error code:".$e->getCode()."<br>";
  echo "Exception Msg: ".$e->getMessage()."<br>";
  exit();
}
}// Update existing value (in case Edit was pressed) 
else {
try{
  $query="UPDATE record SET temperature=?, heat_index=?, wind_speed=?, solar_irradiance=?, air_pollution=?,
  absolute_humidity=?, relative_humidity=?, atmospheric_pressure=?, cloud_cover=?, accumulated_evaporation=?, accumulated_precipitation=?,
  date=?, time=?, weather_description_id=?, temperature_perception_id=?, sky_description_id=?, wind_direction_description_id=?,
  wind_strength_id=?, rain_strength_id=?, snow_strength_id=? WHERE record_id=?";
  $stmt=$mysqli->prepare($query);
  $stmt->bind_param('ddddidididdssiiiiiiii',$_POST['temperature'], $_POST['heat_index'], $_POST['wind_speed'], $_POST['solar_irradiance'], 
    $_POST['air_pollution'], $_POST['absolute_humidity'], $_POST['relative_humidity'], $_POST['atmospheric_pressure'], 
    $_POST['cloud_cover'], $_POST['accumulated_evaporation'], $_POST['accumulated_precipitation'], $_POST['date'], $_POST['time'], 
    $_POST['weather_description'], $_POST['temperature_perception'], $_POST['sky_description'], $_POST['wind_direction'], 
    $_POST['wind_strength'], $_POST['rain_strength'], $_POST['snow_strength'], $recordId);
  $stmt->execute();
} catch (Exception $e) {
  echo "MySQLi Error code:".$e->getCode()."<br>";
  echo "Exception Msg: ".$e->getMessage()."<br>";
  exit();
}
}

header("Location: records.php");
?>
