<?php
include 'connection.php';

$todo =  $_POST['todo'];

$sql = "INSERT INTO `todo`(`todo`) VALUES ('$todo')";
$result = mysqli_query($conn, $sql);
header("location: welcome.php");

?>