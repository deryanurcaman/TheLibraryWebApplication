<?php  
include '../../database/config.php';
$conn = OpenCon();
mysqli_select_db($conn, 'dbproject2021');  
$sql = "SELECT Grantor_Id, Grantor_Code, Grantor_Name, Grantor_Phone_Number FROM grantors";
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "#" . "\t" . "Grantor Code" . "\t" . "Grantor Name" . "\t". "Phone Number" . "\t";  
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
header("Content-Disposition: attachment; filename=Grantor List.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 