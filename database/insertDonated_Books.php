<?php

include 'config.php';
$conn = OpenCon();


$sql = "INSERT INTO Donated_Books (Book_Id, Grantor_Id) VALUES (1,1), (2,2), (3,3);";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
