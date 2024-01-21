<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body class="">
    <?php
    include "navbar.php"
    ?>

    <?php
    include "connection.php";
    $id = $_GET['ID'];
    include "connection.php";
    $sql = "SELECT * FROM `todo` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>
 



    <form action="update1.php">
        <div class="container">
            <div class="row justify-content-center m-auto shadow mt-3 py-3">
            <h1 class="text-center text-primary">UPDATE</h1>
                <div class="col-12">
                <input type="text" value="<?php echo $row['todo'] ?>" class="" name="list" />
                    <button class="btn btn-outline-primary p-2">Update</button>
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />

                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>