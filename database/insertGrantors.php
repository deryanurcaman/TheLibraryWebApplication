//creating existing grantors
<br>

<?php

include 'config.php';
$conn = OpenCon();


$sql = "INSERT INTO Grantors (Grantor_Code, Grantor_Name, Grantor_Phone_Number) VALUES 
('GR1', 'Andre Egwu', '12331234580'),
('GR2', 'Talbott Winger', '12331234581'),
('GR3', 'Murphy McNully', '12331234582'),
('GR4', 'Fred Weasley', '12331234583'),
('GR5', 'George Weasley', '12331234584'),
('GR6', 'Cedric Diggory', '12331234585'),
('GR7', 'Beatrice Haywood', '12331234586'),
('GR8', 'Alanza Alves', '12331234587'),
('GR9', 'Merula Snyde', '12331234588'),
('GR10', 'Ismelda Murk', '12331234589');";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
