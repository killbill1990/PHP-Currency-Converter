<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            background-color: white
        }

        .Menou_bar {

            background-color: rgb(121, 126, 134);
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: flex-start;
            /* height: 200px; */
        }

        .Menou_bar a {
            border: 1px solid black;
            border-radius: 5px;
            background-color: rgb(121, 126, 134);
            font-family: sans-serif;
            font-size: 25px;
            text-decoration: none;
            margin-top: 20px;
            margin-bottom: 180px;
            margin-left: 10px;
            margin-right: 10px;
            padding: 10px;
        }
    </style>
</head>

<body>

    <form class="Menou_bar" action="Navbar.php">



        <?php if (isset($_SESSION['uname'])) { ?>


            <a class="menou" href="Home.php">Home</a>
            <a class="menou" href="Converter.php">Converter</a>
            <a class="menou" href="update_new.php">Update</a>
            <a class="menou" href="login.php">Logout</a>

        <?php } else { ?>

            <a class="menou" href="Home.php">Home</a>
            <a class="menou" href="Converter.php">Converter</a>
            <a class="menou" href="login.php">Login</a>

        <?php } ?>
    </form>

</body>

</html>