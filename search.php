<?php
require_once 'connection.php';

$link = mysqli_connect($host, $user, $password, $database) 
or die ("Error" . mysqli_error());

$name = strtr($_GET['name'], '*', '%');
$specialization = strtr($_GET['specialization'], '*', '%');

echo "<form method='GET' action='search.php'>
<p>Введите имя осужденного: <input type='text' name='name' value='$name'></p>
<p>Введите специализацию отряда: <input type='text' name='specialization' value='$specialization'></p>
<p><input type='submit' name='enter' value='Search'></p>
</form>";

if (isset($_GET['enter']))
{
$sql="SELECT prisoner.name, detachment.specialization
FROM prisoner, detachment
WHERE prisoner.number_detachment = detachment.number_detachment
AND prisoner.name LIKE '%$name%' AND detachment.specialization LIKE '%$specialization%'";

$result = mysqli_query($link, $sql);

echo "<table border='1'> 
<tr> 
<th>name</th> 
<th>specialization</th> 
</tr>";

while($row = mysqli_fetch_array($result)) 
{ 
echo "<tr>"; 
echo "<td>" . $row['name'] . "</td>"; 
echo "<td>" . $row['specialization'] . "</td>"; 
echo "</tr>"; 
}

echo "</table>"; 
}

mysqli_close($link);
?>
