
<?php
session_start();

$host="host";         // provide host
$user="user";         // provide the user that has access to that DB
$passwd="pass";       // password of that user
$db="db";             // DataBase name

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
  $mysqli=new mysqli($host,$user,$passwd,$db);
  $mysqli->set_charset('utf8');
} catch (Exception $e) {
  echo "MySQLi Error code:".$e->getCode()."<br>";
  echo "Exception Msg: ".$e->getMessage()."<br>";
  exit();
}

// Generate random key for the session
// key_length : integer representing the length of the key
function random_key($key_length) {
  $pass = NULL;
  $charlist = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz0123456789-';
  $ps_len = strlen($charlist);
  mt_srand((double)microtime()*1000000);

  for($i = 0; $i < $pw_length; $i++) {
    $pass .= $charlist[mt_rand(0, $ps_len - 1)];
  }
  return ($pass);
}
?>
