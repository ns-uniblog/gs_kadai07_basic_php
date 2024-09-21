<?php
$date = date("Y-m-d H:i:s");
$name= $_POST["name"];
$email= $_POST["email"];
$order_pasta= $_POST["order_pasta"];
$order_pizza= $_POST["order_pizza"];
$order_curry= $_POST["order_curry"];
$memo= $_POST["memo"];
$c= ",";
$str= $date.$c.$name.$c.$email.$c.$order_pasta.$c.$order_pizza.$c.$order_curry.$c.$memo;

$file= fopen("write.csv","a");
fwrite($file, $str."\n");
fclose($file);

header("Location: index.php");
exit;
?>