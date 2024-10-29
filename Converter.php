<?php include 'db_conn.php';

include 'search_categories_table.php';
include "Navbar.php";

if (count($_POST) > 0) {





    $price = '';
    if (isset($_POST["submit"])) {

        //The variable i put in the main menou

        $input_value = $_POST['old_currancy'];
        $input_type = $_POST['typeMenou'];
        $output_type = $_POST['typeMenou2'];


        //I choose the data from the database
        $sql = "SELECT * FROM converter where typeFrom = '$input_type' and typeTo = '$output_type'";

        //I make checks to be sure tha the data are taken
        $result = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);
            $coinResult = (float)$input_value * $row['value'];
            $coin = $output_type;
        } else {
            echo 'I cannot find the elements';
        }
    } else if (isset($_POST['update'])) {
        echo 'Hello';
        header('Location:/php/New_Aufgabe_Factset_English/login.php');
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currancy Calculator</title>

    <style>
        * {
            padding: 0;
            margin: 0;
        }

        table.table {
            border-collapse: collapse;
            margin: 100px 40%;
            font-size: 15px;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 80px rgba(0, 0, 0, 0.15);
        }

        table.table tr {
            text-align: left;
            line-height: 30px;
        }

        .cell1 {
            line-height: 40px;
            width: 100%;
            font-size: 30px;
        }

        .cell2 {
            line-height: 40px;
            width: 40%;
            font-size: 30px;
        }

        table.table td {
            padding: 12px 15px;
        }

        table th {
            text-align: center;
            font-size: 30px;
            padding: 15px;
        }
    </style>
</head>


<body>

    <form class="Converter_form" action="New_Aufgabe_Factset_English.php" method="POST">

        <table class="table">

            <tr>
                <th>Currency Converter</th>
            </tr>


            <tr>

                <td>
                    <input class="cell1" type="text" name="old_currancy" placeholder="Amount" value="<?php if (!empty($input_value)) echo $input_value;
                                                                                                        else echo ''; ?>">
                </td>
            </tr>
            <tr>


                <td>
                    <select name="typeMenou" class="cell2">

                        <option>From</option>
                        <?php
                        foreach ($options as $item) {
                            echo '<option   value="' . strtolower($item) . '">' . $item . '</option>';
                            $variable = '<option   value="' . strtolower($item) . '">' . $item . '</option>';
                        }
                        ?>

                    </select>


                    <select name="typeMenou2" class="cell2">

                        <option>To</option>
                        <?php
                        foreach ($options as $item) {
                            echo '<option   value="' . strtolower($item) . '">' . $item . '</option>';
                        }
                        ?>

                    </select>
                </td>
            </tr>
            <tr>


                <td>
                    <input class="cell1" type="text" placeholder="Result" value="<?php if (isset($result)) echo $coinResult . " " . $output_type; ?>" placeholder="coin value">
                </td>
            </tr>

            <tr>

                <td>
                    <input class="cell1" type="submit" name="submit" value="Submit">



                </td>
            </tr>
            <tr>
                <td>
                    <input class="cell1" type="submit" name="update" value="Update">
                </td>
            </tr>

        </table>
    </form>

</body>

</html>