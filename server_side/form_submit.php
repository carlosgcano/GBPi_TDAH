<?php
$host = "127.0.0.1";
$db_name = "gbpi";
$username = "root";
$password = "";
$connection = null;
try{
$connection = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
$connection->exec("set names utf8");
}catch(PDOException $exception){
echo "Connection error: " . $exception->getMessage();
}

function saveData($name, $n_act, $message){
global $connection;
$query = "INSERT INTO gbpi_web(name, n_act, message) VALUES( :name, :n_act, :message)";

$callToDb = $connection->prepare( $query );
$name=htmlspecialchars(strip_tags($name));
$n_act=htmlspecialchars(strip_tags($n_act));
$message=htmlspecialchars(strip_tags($message));
$callToDb->bindParam(":name",$name);
$callToDb->bindParam(":n_act",$n_act);
$callToDb->bindParam(":message",$message);

if($callToDb->execute()){
return '<h3 style="text-align:center;">We will get back to you very shortly!</h3>';
}
}

if( isset($_POST['submit'])){
$name = htmlentities($_POST['name']);
$n_act = htmlentities($_POST['n_act']);
$message = htmlentities($_POST['message']);

//then you can use them in a PHP function. 
$result = saveData($name, $n_act, $message);
echo $result;
}
else{
echo '<h3 style="text-align:center;">A very detailed error message ( ͡° ͜ʖ ͡°)</h3>';
}
?>

