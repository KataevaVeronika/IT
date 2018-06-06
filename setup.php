<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Error" . mysqli_error($link));

echo "You connected successfully ";

$sql = "CREATE TABLE Barak (
    Number_barak int(10) NOT NULL, 
    Conditions varchar(30) NOT NULL,
    Quantity_prisoner int(3) NOT NULL,
    PRIMARY KEY(Number_barak)
    )";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "CREATE TABLE Civilian (
    Number_civilian int(10) NOT NULL,
    Name varchar(50) NOT NULL,
    Position varchar(30) NOT NULL,
    PRIMARY KEY(Number_civilian)
    )";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "CREATE TABLE Supervisor_colony (
    Name_supervisor varchar(50) NOT NULL,
    Duties varchar(100) NOT NULL,
    Working_hours varchar(15) NOT NULL,
    Rank varchar(15) NOT NULL,
    PRIMARY KEY(Name_supervisor)
    )";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "CREATE TABLE Detachment (
    Number_detachment int(10) NOT NULL,
    Specialization varchar(20) NOT NULL,
    PRIMARY KEY(Number_detachment)
    )";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "CREATE TABLE Prisoner (
    Number_prisoner int(10) NOT NULL,
    Number_barak int(10) NOT NULL,
    Number_detachment int(10) NOT NULL, 
    Name varchar(50) NOT NULL,
    Term varchar(10) NOT NULL,
    Clause int(10) NOT NULL,
    PRIMARY KEY(Number_prisoner),
    FOREIGN KEY(Number_barak) REFERENCES Barak (Number_barak),
    FOREIGN KEY(Number_detachment) REFERENCES Detachment (Number_detachment)
    )";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "CREATE TABLE Deputy (
    Number_deputy int(10) NOT NULL,
    Name_supervisor varchar(50) NOT NULL,
    Position varchar(30) NOT NULL,
    Name varchar(50) NOT NULL,
    Rank varchar(30) NOT NULL,
    PRIMARY KEY(Number_deputy),
    FOREIGN KEY(Name_supervisor) REFERENCES Supervisor_colony (Name_supervisor)
    )";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "CREATE TABLE Worker_security (
    Number_worker_security int(10) NOT NULL,
    Number_deputy int(10) NOT NULL,
    Name varchar(50) NOT NULL,
    Position varchar(30) NOT NULL,
    Rank varchar(30) NOT NULL,
    PRIMARY KEY(Number_worker_security),
    FOREIGN KEY(Number_deputy) REFERENCES Deputy (Number_deputy)
    )";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "CREATE TABLE Appointment (
    Number_appointment int(10) NOT NULL,
    Number_prisoner int(10) NOT NULL,
    Number_deputy int(10) NOT NULL,
    Personal_question varchar(50) NOT NULL,
    PRIMARY KEY(Number_appointment),
    FOREIGN KEY(Number_prisoner) REFERENCES Prisoner (Number_prisoner),
    FOREIGN KEY(Number_deputy) REFERENCES Deputy (Number_deputy)
    )";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "CREATE TABLE Work (
    Number_work int(10) NOT NULL,
    Number_civilian int(10) NOT NULL,
    Number_prisoner int(10) NOT NULL,
    Working_hours varchar(15) NOT NULL,
    PRIMARY KEY(Number_work),
    FOREIGN KEY(Number_prisoner) REFERENCES Prisoner (Number_prisoner),
    FOREIGN KEY(Number_civilian) REFERENCES Civilian (Number_civilian)
    )";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "CREATE TABLE Employee_protection (
    Number_employee_protection int(10) NOT NULL,
    Name_supervisor varchar(50) NOT NULL,
    Number_deputy int(10) NOT NULL,
    Duties varchar(50) NOT NULL,
    Name varchar(50) NOT NULL,
    Rank varchar(30) NOT NULL,
    PRIMARY KEY(Number_employee_protection),
    FOREIGN KEY(Name_supervisor) REFERENCES Supervisor_colony (Name_supervisor),
    FOREIGN KEY(Number_deputy) REFERENCES Deputy (Number_deputy)
    )";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "CREATE TABLE Schedule (
    Number_prisoner int(10) NOT NULL,
    Number_worker_security int(10) NOT NULL,
    Number_civilian int(10) NOT NULL, 
    Number_work int(10) NOT NULL,
    Date_of varchar(15) NOT NULL,
    Time_of varchar(20) NOT NULL,
    FOREIGN KEY(Number_prisoner) REFERENCES Prisoner (Number_prisoner),
    FOREIGN KEY(Number_worker_security) REFERENCES Worker_security (Number_worker_security),
    FOREIGN KEY(Number_civilian) REFERENCES Civilian (Number_civilian),
    FOREIGN KEY(Number_work) REFERENCES Work (Number_work)
    )";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "CREATE TABLE Contract (
    Number_contract int(10) NOT NULL,
    Number_worker_security int(10) NOT NULL, 
    Number_employee_protection int(10) NOT NULL,
    Name_supervisor varchar(50) NOT NULL,
    Date_of_imprisonment varchar(15) NOT NULL,
    Validity varchar(20) NOT NULL,
    PRIMARY KEY(Number_contract),
    FOREIGN KEY(Number_worker_security) REFERENCES Worker_security (Number_worker_security),
    FOREIGN KEY(Number_employee_protection) REFERENCES Employee_protection (Number_employee_protection),
    FOREIGN KEY(Name_supervisor) REFERENCES Supervisor_colony (Name_supervisor)
    )";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "INSERT INTO Barak VALUES ('101', 'Good', '72'), 
    ('102', 'Bad', '102'),
    ('103', 'Middle', '97'),
    ('104', 'Good', '84'),
    ('105', 'Good', '111')";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "INSERT INTO Civilian VALUES ('111', 'Zmeev Aleksandr Viktorovich', 'Human Resources Officer'), 
    ('112', 'Gareev Mihail Jurevich', 'Cook'),
    ('113', 'Pavlova Elena Anatolevna', 'Labor department employee'),
    ('114', 'Makarenko Artem Igorevich', 'Special department employee'),
    ('115', 'Afanaseva Darja Pavlovna', 'Therapist')";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "INSERT INTO Supervisor_colony VALUES ('Sokolov Maksim Alekseevich', 'Controlling the operation of the zone', '08:00 - 17:00', 'Colonel'),
    ('Alexandrov Sergey Dmitrievich', 'Former supervisor', '-', 'Colonel')";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "INSERT INTO Detachment VALUES ('4', 'Sawmill'), 
    ('5', 'Woodсarving'), 
    ('6', 'Sewing'),
    ('7', 'Pottery'), 
    ('8', 'Boiler room')";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "INSERT INTO Prisoner VALUES ('759', '101', '6', 'Ruslanov Sergey Vladimirovich', '2 years', '107'), 
    ('760', '105', '7', 'Veselov Dmitry Olegovich', '5 years', '158'),
    ('761', '103', '4', 'Kovalev Oleg Vasilievich', '4 years', '161'),
    ('762', '104', '5', 'Zharov Petr Alexandrovich', '9 years', '115'),
    ('763', '105', '7', 'Ustyugov Nikolai Andreevich', '3 years', '131')";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "INSERT INTO Deputy VALUES ('21', 'Sokolov Maksim Alekseevich', 'Deputy for security', 'Kovalev Anton Sergeevich', 'Lieutenant colonel'), 
    ('22', 'Sokolov Maksim Alekseevich', 'Deputy for the protection', 'Sobolev Artur Sergeevich', 'Major'), 
    ('23', 'Sokolov Maksim Alekseevich', 'Deputy for logistic support', 'Stashevsky Pavel Sergeevich', 'Captain'),
    ('24', 'Sokolov Maksim Alekseevich', 'Deputy for production', 'Larin Anton Vladimirovich', 'Captain'), 
    ('25', 'Sokolov Maksim Alekseevich', 'Deputy on educational work', 'Belov Vitaliy Viktorovich', 'Major')";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "INSERT INTO Worker_security VALUES ('41', '21', 'Ovsyannikov Sergey Vasilievich', 'Inspector', 'Major'), 
    ('42', '21', 'Elfimov Vladimir Vladimirovich', 'Deputy Deputy', 'Lieutenant colonel'), 
    ('43', '21', 'Sazonov Anton Sergeevich', 'Junior Inspector', 'Lieutenant'),
    ('44', '21', 'Karpov Denis Sergeevich', 'Inspector', 'Senior Warrant Officer'), 
    ('45', '21', 'Polyakov Andrei Alexandrovich', 'Duty Officer', 'Ensign')";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "INSERT INTO Appointment VALUES ('1567', '760', '24', 'Question about production'), 
    ('1568', '761', '22', 'Question of protection'),
    ('1569', '763', '22', 'Question of protection'),
    ('1570', '760', '23', 'The issue of logistical support'),
    ('1571', '762', '21', 'Question about security')";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "INSERT INTO Work VALUES ('1', '115', '759', '15:00 - 17:00'), 
    ('2', '112', '760', '08:00 - 10:00'),
    ('3', '115', '761', '10:00 - 12:00'),
    ('4', '115', '762', '12:00 - 17:00'),
    ('5', '112', '763', '13:00 - 16:00')";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "INSERT INTO Employee_protection VALUES ('33', 'Sokolov Maksim Alekseevich', '22', 'Scan Vehicles', 'Boldyrev Konstantin Sergeevich', 'Soldier'), 
    ('34', 'Alexandrov Sergey Dmitrievich', '22', 'Circumvent perimeter', 'Tatchin Alexander Valerevich', 'Senior Warrant Officer'), 
    ('35', 'Sokolov Maksim Alekseevich', '22', 'Stand on tower', 'Pozharsky Alexander Dmitrievich', 'Sergeant'),
    ('36', 'Alexandrov Sergey Dmitrievich', '22', 'Circumvent perimeter', 'Borisov Artem Alexandrovich', 'Ensign'), 
    ('37', 'Sokolov Maksim Alekseevich', '22', 'Stand at checkpoint', 'Druzhinin Mikhail Vadimovich', 'Major')";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "INSERT INTO Schedule VALUES ('759', '41', '111', '2', '21.01.2018', '08:00 - 10:00'), 
    ('760', '42', '112', '5', '21.01.2018', '10:00 - 12:00'), 
    ('761', '43', '113', '1', '21.01.2018', '12:00 - 14:00'),
    ('762', '44', '114', '3', '21.01.2018', '14:00 - 16:00'), 
    ('763', '45', '115', '4', '21.01.2018', '16:00 - 17:00')";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

$sql = "INSERT INTO Contract VALUES ('71', '41', '33', 'Sokolov Maksim Alekseevich', '23.09.2015', '3 years'), 
    ('72', '42', '34', 'Alexandrov Sergey Dmitrievich', '30.03.2017', '5 years'), 
    ('73', '43', '35', 'Sokolov Maksim Alekseevich', '12.02.2018', '3 months'),
    ('74', '44', '36', 'Alexandrov Sergey Dmitrievich', '16.12.2016', '5 years'), 
    ('75', '45', '37', 'Sokolov Maksim Alekseevich', '09.08.2017', '3 years')";
if (mysqli_query($link, $sql)) {
    echo "Created successfully ";
} else {
    echo "Error" . mysqli_error($link);
}

mysqli_close($link);
?>