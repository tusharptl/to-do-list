<?php
if (isset($_POST["submit"])) {
    include "connection.php";
    $name = mysqli_real_escape_string($conn,$_POST["user"]) ;
    $email = mysqli_real_escape_string($conn,$_POST["email"]) ;
    $mobile =mysqli_real_escape_string($conn, $_POST["mobile"]) ;
    $password =mysqli_real_escape_string($conn,$_POST["pass"]) ;
    $cpassword =mysqli_real_escape_string($conn,$_POST["cpass"]) ;

    

    $sql = "select * from user where name ='$name'";
    $result = mysqli_query($conn, $sql);
    $count_user = mysqli_num_rows($result);

    $sql = "select * from user where mobile_no ='$mobile'";
    $result = mysqli_query($conn, $sql);
    $count_mobile = mysqli_num_rows($result);

    $sql = "select * from user where email ='$email'";
    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);

    if ($count_user == 0 && $count_mobile == 0 && $count_email == 0) {

        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user(name, email, mobile_no, password) VALUES ('$name', '$email','$mobile','$hash')";
            $result = mysqli_query($conn, $sql);
            header("location: signin.php");

        } else {
            echo '<script>
            alert("Password do not match");
            header("location: signup.php");
            </script>';
        }
        
    } else {

        echo '<script>
        alert("User already exists!!!") ;
        header("location: index.php");
        </script>';
    
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
        <h1>Signup Form</h1>
        <form action="signup.php" name="form" method="POST">
            <label for="">Enter Name</label>
            <input type="text" name="user" id="user" /><br><br>
            <label for="">Enter Email</label>
            <input type="email" name="email" id="email" /><br><br>
            <label for="">Enter Mobile No</label>
            <input type="text" name="mobile" id="mobile" /><br><br>
            <label for="">Enter Password</label>
            <input type="password" name="pass" id="pass" /><br><br>
            <label for="">Confirm Password</label>
            <input type="password" name="cpass" id="cpass" /><br><br>
            <input type="submit" id="btn" name="submit" value="Register">
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>