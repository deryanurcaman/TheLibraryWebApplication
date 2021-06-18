<?php  
include '../../database/config.php';
$conn = OpenCon();
mysqli_select_db($conn, 'dbproject2021');  
$sql = "SELECT `Book_Id`,`Book_Code`,`Book_Name`,`Author`, `Type`, `Num_of_Edition`,`Quantity`,`PublishingHouse_Name` FROM `books`";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "#" . "\t" . "Book Code" . "\t" . "Book Name" . "\t". "Author" . "\t" .  "Type" . "\t" . "Number of Edition" . "\t". "Quantity" . "\t". "Publisher" . "\t";  
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
header("Content-Disposition: attachment; filename=Book Archive.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 