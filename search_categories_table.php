<?php
include 'db_conn.php';

$options = array();
$category = "SELECT DISTINCT typeFrom FROM converter";
$all_categories = mysqli_query($conn, $category);
while ($rowTable = mysqli_fetch_assoc($all_categories)) {
    array_push($options, $rowTable['typeFrom']);
}
