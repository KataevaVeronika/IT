<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Error" . mysqli_error($link));

echo "You connected successfully<br>";

$sql ="SELECT DISTINCT Contract.Number_contract as Number_contract, Contract.Validity as Validity, Supervisor_colony.Name_supervisor as Name_supervisor, Employee_protection.Number_employee_protection as Number_employee_protection
FROM Contract JOIN Supervisor_colony ON Contract.Name_supervisor = Supervisor_colony.Name_supervisor
JOIN Employee_protection ON Employee_protection.Number_employee_protection = Contract.Number_employee_protection";

if (mysqli_query($link, $sql)) {
  echo "Done ";
} else {
  echo "Error " . mysqli_error($link);
}

echo "<table border='1'>
<tr> 
<th>Validity</th>
<th>Name_supervisor</th>
<th>Number_employee_protection</th>
<th><i>Edit</i></th>
<th><i>Delete</i></th>
</tr>";

$request = mysqli_query($link, $sql);

while($row = mysqli_fetch_array($request))
{
echo "<tr>";
echo "<td>" . $row['Validity'] . "</td>";
echo "<td>" . $row['Name_supervisor'] . "</td>";
echo "<td>" . $row['Number_employee_protection'] . "</td>";
echo "<td><a href='edit.php?Number_contract=" . $row['Number_contract'] . "'>update</a></td>";
echo "<td><a href='delete.php?Number_contract=" . $row['Number_contract'] . "'>delete</a></td>";
echo "</tr>";
}


mysqli_close($link);
?>