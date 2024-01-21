<?php
    include "connection.php";
    $id = $_GET['id'];
    $list = $_GET['list'];
    include "connection.php";


    $sql = "UPDATE `todo` SET `id`='$id',`todo`='$list' WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    header("location:welcome.php")
    ?>