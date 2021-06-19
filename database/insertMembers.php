//creating existing members
<br>

<?php

include 'config.php';
$conn = OpenCon();

$sql = "INSERT INTO Members (Member_Code, Member_Name, Member_Phone_Number) VALUES 
('MR1', 'Bill Weasley', '12331234570'), 
('MR2', 'Nymphadora Tonks', '12331234571'), 
('MR3', 'Orion Amari', '12331234572'), 
('MR4', 'Charlie Weasley', '12331234573'), 
('MR5', 'Jae Kim', '12331234574'), 
('MR6', 'Badeea Ali', '12331234575'), 
('MR7', 'Liz Tuttle', '12331234576'), 
('MR8', 'Diego Caplan', '12331234577'), 
('MR9', 'Skye Parkin', '12331234578'), 
('MR10', 'Chiara Lobosca', '12331234579');";




if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);



