<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Error" . mysqli_error());

echo "You connected successfully<br>";

$Number_contract = $_GET['Number_contract'];

$sql_1 ="SELECT DISTINCT Contract.Number_contract as Number_contract, Contract.Validity as Validity, Supervisor_colony.Name_supervisor as Name_supervisor, Employee_protection.Number_employee_protection as Number_employee_protection
FROM Contract JOIN Supervisor_colony ON Contract.Name_supervisor = Supervisor_colony.Name_supervisor
JOIN Employee_protection ON Employee_protection.Number_employee_protection = Contract.Number_employee_protection
WHERE Contract.Number_contract = '" . $Number_contract . "';";

$query_1 = mysqli_query($link, $sql_1);
$arr = mysqli_fetch_array($query_1);

$sql_2 = "SELECT * FROM Supervisor_colony;";
$query_2 = mysqli_query($link, $sql_2);

$sql_3 = "SELECT * FROM Employee_protection;";
$query_3 = mysqli_query($link, $sql_3);

?>


<html>
    <body>
        <form action="edit_update.php" method="get">
            <input type="hidden" name="Number_contract" value=<?php echo $Number_contract; ?>><br>
            Validity:
                <input type="text" name="Validity" value=<?php echo $arr['Validity']; ?>><br>
            Name Supervisor:
                <select name="Name_supervisor">
                <?php 
                    while($row = mysqli_fetch_array($query_2)) {
                        echo $row;
                        if ($row['Name_supervisor'] == $arr['Name_supervisor'])
                            echo "<option selected value='" . $row['Name_supervisor'] . "'>" . $row['Name_supervisor'] . "</option>";
                        else
                            echo "<option value='" . $row['Name_supervisor'] . "'>" . $row['Name_supervisor'] . "</option>";                    
                    }
                ?>
                </select><br><br>
            Number Employee Protection:
                <select name="Number_employee_protection">
                <?php 
                    while($row = mysqli_fetch_array($query_3)) {
                        echo $row;
                        if ($row['Number_employee_protection'] == $arr['Number_employee_protection'])
                            echo "<option selected value='" . $row['Number_employee_protection'] . "'>" . $row['Number_employee_protection'] . "</option>";
                        else
                            echo "<option value='" . $row['Number_employee_protection'] . "'>" . $row['Number_employee_protection'] . "</option>";                    
                    }
                ?>
                </select><br><br>
            <input type="submit" value="Save changes">
        </form>
    </body>
</html>