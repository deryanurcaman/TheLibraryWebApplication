<?php

include 'config.php';
$conn = OpenCon();


$sql = "INSERT INTO Grantors (Grantor_Code, Grantor_Name, Grantor_Phone_Number) VALUES 
('37001', 'Andre Egwu', '12331234580'),
('37002', 'Talbott Winger', '12331234581'),
('37003', 'Murphy McNully', '12331234582'),
('37004', 'Fred Weasley', '12331234583'),
('37005', 'George Weasley', '12331234584'),
('37006', 'Cedric Diggory', '12331234585'),
('37007', 'Beatrice Haywood', '12331234586'),
('37008', 'Alanza Alves', '12331234587'),
('37009', 'Merula Snyde', '12331234588'),
('37010', 'Ismelda Murk', '12331234589');";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
