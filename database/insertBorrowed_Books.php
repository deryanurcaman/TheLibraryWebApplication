<?php

include 'config.php';
$conn = OpenCon();


$sql = "INSERT INTO Borrowed_Books (Book_Id, Member_Id, Borrow_Date, Return_Date) VALUES (1,1, CAST('2021-01-03' AS datetime), CAST('2021-01-03' AS datetime)), (2,2, CAST('2021-01-03' AS datetime), CAST('2021-01-03' AS datetime)), (3,3, CAST('2021-01-03' AS datetime), CAST('2021-01-03' AS datetime));";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
