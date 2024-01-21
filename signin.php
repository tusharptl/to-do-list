<?php

include 'connection.php';
if (isset($_POST["login"])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);


$sql = "select * from user where email ='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


if ($row) {
    if (password_verify($password, $row['password'])) {
        header("location:welcome.php");
    } else {
        echo '<script>
            alert("Invalid Email or Password");
            header("location: signin.php");
            </script>';
    }
}
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List</title>
    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar -->
    <?php
    include "navbar.php"
    ?>
    <div id="form">
        <h1>Signin Form</h1>
        <form action="" name="form" method="POST">
            <label for="">Enter Email</label>
            <input type="email" name="email" id="email" /><br><br>
            <label for="">Enter Password</label>
            <input type="password" name="pass" id="pass" /><br><br>
            <input type="submit" id="btn" name="login" value="Login">
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>