<?php  
include '../../database/config.php';
$conn = OpenCon();
mysqli_select_db($conn, 'dbproject2021');  
$sql = "SELECT Grantor_Code, Grantor_Name, Grantor_Phone_Number, Book_Name, Donated_Quantity, Donate_Employee
FROM `Grantors` 
    LEFT JOIN `Donated_Books` ON `Donated_Books`.`Grantor_Id` = `Grantors`.`Grantor_Id` 
    LEFT JOIN `Books` ON `Donated_Books`.`Book_Id` = `Books`.`Book_Id` 
    WHERE `Grantors`.`Grantor_Code` = '" . $_GET["Grantor_Code"] . "'";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "Grantor Code" . "\t" . "Grantor Name" . "\t". "Phone Number" . "\t". "Donated Book Name" . "\t". "Donated Quantity" . "\t". "Donate Process Employee" . "\t";  
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Grantor Detail List.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 