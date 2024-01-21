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


    <!-- get data -->
    <?php
    include "connection.php";
    $sql = "SELECT * FROM `todo`";
    $result = mysqli_query($conn, $sql);
    ?>


    <form action="insert.php" method="POST">
        <div class="container">
            <div class="row justify-content-center m-auto shadow mt-3 py-3">
                <h1 class="text-center text-primary">TODO</h1>
                <div class="col-12">
                    <input type="text" class="" name="todo" id="todo" />
                    <button class="btn btn-outline-primary">ADD</button>
                </div>
            </div>
        </div>
    </form>



    <div class="container">
        <div class="p-5 ">
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div><?php echo $row['id'] ?> <?php echo $row['todo'] ?></div>
                    <div>
                        <a href="delete.php?ID=<?php echo $row['id'] ?>" class="btn btn-outline-danger">Delete</a>
                        <a href="update.php?ID=<?php echo $row['id'] ?>" class="btn btn-outline-success">Update</a>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>