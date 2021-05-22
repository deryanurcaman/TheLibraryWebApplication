<?php

$conn = mysqli_connect('localhost','webuser','123456','databasesproject2021',3308);
if(!$conn){
    die ("Fail connection". mysqli_connect_error());
}

$sql = "INSERT INTO Employees (Employee_Id, Member_Id, Employee_Name, Employee_Phone_Number, Sex, Salary, Email, Password) VALUES (1, 0, 'Rowan Khanna', 12331234560, 'Female', 4616, 'rkhanna@gmail.com', 'Rowan121'), (2, 0, 'Ben Copper', 12331234561, 'Male', 4616, 'bcopper@gmail.com', 'Ben122'), (3, 0, 'Penny Haywood', 12331234562, 'Female', 4616, 'phaywood@gmail.com', 'Penny123'), (4, 0, 'Barnaby Lee', 12331234563, 'Male', 4616, 'blee@gmail.com', 'Barnaby124'), (5, 0, 'Tulip Karasu', 12331234564, 'Female', 4616, 'tkarasu@gmail.com', 'Tulip125');";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
