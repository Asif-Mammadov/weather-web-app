<?php
include("connectDB.inc.php");

//Check if code exists and assign related id
if(array_key_exists('code', $_GET) and array_key_exists($_GET['code'], $_SESSION['code'])){
$recordId = $_SESSION['code'][$_GET['code']];	
} else {
	exit();
}
// Hiding that id from the client side
$query="UPDATE record SET validRecord=0 WHERE record_id=?";
$stmt=$mysqli->prepare($query);
$stmt->bind_param('i',$recordId);
$stmt->execute();
header("Location: records.php");

?>
