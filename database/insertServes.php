<?php

include 'config.php';
$conn = OpenCon();


$sql = "INSERT INTO Serves (Member_Id, Employee_Id) VALUES (1,6), (2,1), (3,1);";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
