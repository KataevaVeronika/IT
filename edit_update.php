<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Error" . mysqli_error());

header("Location: list.php");

$Number_contract = $_GET['Number_contract'];
$Validity = $_GET['Validity'];
$Name_supervisor = $_GET['Name_supervisor'];
$Number_employee_protection = $_GET['Number_employee_protection'];

$sq1 = "UPDATE Contract
        SET Validity = '" . $Validity . "',
            Name_supervisor = '" . $Name_supervisor . "',
            Number_employee_protection = '" . $Number_employee_protection . "'
        WHERE Number_contract=" . $Number_contract . ";";

$q1 = mysqli_query($link, $sq1);
mysqli_close($link);
?>