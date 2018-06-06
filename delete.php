<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Error" . mysqli_error());


header("Location: list.php");

$Number_contract = $_GET['Number_contract'];

$sq = "DELETE
        FROM Contract
        WHERE Number_contract = '" . $Number_contract . "';";

if (mysqli_query($link, $sq)) {
  echo "The contract has been successfully canceled";
} else {
  echo "Try again" . mysqli_error($link);
}

mysqli_close($link);
?>