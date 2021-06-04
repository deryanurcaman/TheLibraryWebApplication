<?php

include 'config.php';
$conn = OpenCon();

$sql = "INSERT INTO Members (Member_Code, Member_Name, Member_Phone_Number) 
VALUES ('35001', 'Bill Weasley', '12331234570'), 
('35002', 'Nymphadora Tonks', '12331234571'), 
('35003', 'Orion Amari', '12331234572'), 
('35004', 'Charlie Weasley', '12331234573'), 
('35005', 'Jae Kim', '12331234574'), 
('35006', 'Badeea Ali', '12331234575'), 
('35007', 'Liz Tuttle', '12331234576'), 
('35008', 'Diego Caplan', '12331234577'), 
('35009', 'Skye Parkin', '12331234578'), 
('35010', 'Chiara Lobosca', '12331234579');";




if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);



