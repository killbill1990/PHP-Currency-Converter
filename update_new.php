<?php


use LDAP\Result;

include "Navbar.php";
include 'db_conn.php';
include 'search_categories_table.php';
include "update_categories.php";


if (!isset($_SESSION['uname'])) {
    header('Location:http://localhost/php/Currency_Converter/Home.php');
}

if (count($_POST) > 0) {

    //the values which i put in the main menou
    $typeFrom = $_POST['typeMenou'];
    $typeTo = $_POST['typeMenou2'];
    $value = $_POST['old_currancy'];



    //the update function
    if (isset($_POST["update"])) {

        //i take the data from database to know the existence of that element
        $res = "SELECT * FROM converter where typeFrom = '" . $typeFrom . "' and typeTo ='" . $typeTo . "'";
        $result_check = mysqli_query($conn, $res);
        if (mysqli_num_rows($result_check) == 1) {

            //i update the element 
            $sql = "UPDATE converter SET value= '" . $value . "'  where typeFrom = '" . $typeFrom . "' and typeTo ='" . $typeTo . "' ";
            $result = mysqli_query($conn, $sql);

            if ($result !== FALSE) {
                echo ("That element has  been updated.");
            } else {
                echo ("The column has not been updated.");
            }
        } else {
            echo ("The is not that element.");
        }

        //the add function
    } else if (isset($_POST["add"])) {

        //i take the data from database to know the existence of that element
        $check = "SELECT * FROM converter where typeFrom = '" . $typeFrom . "' and typeTo ='" . $typeTo . "'";
        $result_check = mysqli_query($conn, $check);

        if (mysqli_num_rows($result_check) == 1) {

            echo ("The column has not been inserted.");
        } else {

            $sql = "INSERT INTO converter (typeFrom, typeTo, value)
            VALUES ('$typeFrom', '$typeTo', '$value')";
            $result = mysqli_query($conn, $sql);

            if ($result !== FALSE) {

                echo ("The column has been inserted.");
            } else {

                echo ("The column has not been inserted.");
            }
        }

        //the delete function
    } else if (isset($_POST["delete"])) {

        $check = "SELECT * FROM converter where typeFrom = '" . $typeFrom . "' and typeTo ='" . $typeTo . "'";
        $result_check = mysqli_query($conn, $check);

        if (mysqli_num_rows($result_check) === 0) {

            echo ("There is not such an element");
        } else {

            $sql = "DELETE from converter where typeFrom = '" . $typeFrom . "' and typeTo ='" . $typeTo . "'";
            $deleterow = mysqli_query($conn, $sql);

            if ($deleterow !== FALSE) {

                echo ("The row has been deleted.");
            } else {

                echo ("The row has not been deleted.");
            }
        }
        //the logout function
    } else if (isset($_POST["logout"])) {

        header('Location:/php/New_Aufgabe_Factset_English/New_Aufgabe_Factset_English.php');
    }
}

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
            padding: 0;
            margin: 0;
        }

        table {
            border-collapse: collapse;
            margin: 100px 40%;
            font-size: 15px;
            font-family: sans-serif;
            min-width: 400px;
            font-size: 25px;

            box-shadow: 0 0 80px rgba(0, 0, 0, 0.15);
        }

        table th {

            padding: 15px;
        }

        table td {

            margin: 5px;
            padding: 10px;

        }

        table .cell1 {
            font-size: 25px;
            width: 40%;
        }

        table .cell {
            font-size: 25px;
            width: 100%;
        }
    </style>
</head>

<body>

    <form action="update_new.php" method="POST">

        <table>
            <tr>
                <th> Converter Changes</th>
            </tr>

            <tr>
                <td>
                    <input class="cell" placeholder="Amount" type="text" name="old_currancy" value="">
                </td>
            </tr>

            <tr>
                <td>
                    <select class="cell1" name="typeMenou">
                        <option>From</option>
                        <?php
                        foreach ($options2 as $item) {
                            echo '<option   value="' . strtolower($item) . '">' . $item . '</option>';
                        }
                        ?>

                    </select>


                    <select class="cell1" name="typeMenou2">

                        <option>To</option>
                        <?php
                        foreach ($options2 as $item) {
                            echo '<option   value="' . strtolower($item) . '">' . $item . '</option>';
                        }
                        ?>

                    </select>

                </td>
            </tr>

            <tr>
                <td>
                    <input class="cell" type="submit" value="Update" name="update">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="cell" type="submit" value="Add" name="add">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="cell" type="submit" value="Delete" name="delete">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="cell" type="submit" name="logout" value="Log Out">
                </td>
            </tr>
        </table>
    </form>

</body>

</html>