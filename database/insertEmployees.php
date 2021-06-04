<?php

include 'config.php';
$conn = OpenCon();


$sql = "INSERT INTO Employees (Employee_Code, Employee_Name, Employee_Phone_Number, Sex, Username, Password) VALUES ('1001', 'Rowan Khanna', '12331234560', 'Female',  'rkhanna', '12345'), ('1002','Ben Copper', '12331234561', 'Male',  'bcopper', '12345'), ('1003','Penny Haywood', '12331234562', 'Female',  'phaywood', '12345'), ('1004','Barnaby Lee', '12331234563', 'Male',  'blee', '12345'), ('1005','Tulip Karasu', '12331234564', 'Female',  'tkarasu', '12345');";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
