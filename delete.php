<?php
include 'connection.php';

echo $id = $_GET['ID'];

$sql = " DELETE FROM `todo` WHERE Id = $id ";
$result = mysqli_query($conn, $sql);

header("location:welcome.php");

?>