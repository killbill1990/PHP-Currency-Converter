<?php
include 'db_conn.php';

$options2 = array();
$category = "SELECT DISTINCT type FROM typecurrency";
$all_categories = mysqli_query($conn, $category);
while ($rowTable = mysqli_fetch_assoc($all_categories)) {
    array_push($options2, $rowTable['type']);
}
