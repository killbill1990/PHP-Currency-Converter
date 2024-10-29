<?php

include "Navbar.php";
include 'db_conn.php';



if (isset($_POST['uname']) && isset($_POST['password'])) {


    // i take the data 
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname  = validate($_POST['uname']);
    $password = validate($_POST['password']);

    //Make the data are corected with the clews which are in database

    if (empty($uname) || empty($password)) {
        header('Location:login.php?error=User name or password is required');
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $_SESSION['uname'] = $uname;
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $password) {
                $_SESSION['uname'];
                header("Location:/php/Currency_Converter/Home.php");
            }
        } else
            header('Location:/php/Currency_Converter/login.php?Error = name or password');
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">

    <style>
        * {
            padding: 0;
            margin: 0;
        }

        table {
            border-collapse: collapse;
            margin: 100px 40%;
            font-size: 15px;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 80px rgba(0, 0, 0, 0.15);
        }

        table th {
            text-align: center;
            font-size: 25px;

        }

        table tr {
            text-align: left;
            line-height: 30px;
        }

        .lb {
            font-size: 25px;
        }

        table td {
            padding: 12px 15px;
        }
    </style>

</head>

<body>

    <!-- THe form where i will put the user name = rout and the password = rout -->
    <form <?php echo $_SERVER['PHP_SELF']; ?> method="post">

        <table>
            <th> Log In</th>
            <tr>
                <td>
                    <label class="lb">User Name</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="lb" type="text" name="uname" placeholder="User Name">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="lb">Password</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="lb" type="password" name="password" placeholder="Password">
                </td>
            </tr>
            <tr>
                <td>
                    <button class="lb" type="submit" name="submit" value="submit">Log In</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>