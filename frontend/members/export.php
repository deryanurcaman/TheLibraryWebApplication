<?php  
include '../../database/config.php';
$conn = OpenCon();
mysqli_select_db($conn, 'dbproject2021');  
$sql = "SELECT Member_Id, Member_Code, Member_Name, Member_Phone_Number
FROM members";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "#" . "\t" . "Member Code" . "\t" . "Member Name" . "\t". "Phone Number" . "\t";  
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
header("Content-Disposition: attachment; filename=Member List.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 