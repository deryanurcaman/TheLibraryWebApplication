<?php  
include '../../database/config.php';
$conn = OpenCon();
mysqli_select_db($conn, 'dbproject2021');  
$sql = "SELECT Member_Code, Member_Name, Member_Phone_Number, Book_Name, Borrow_Date, Serve_Employee, Return_Date, Return_Employee
FROM `Borrowed_Books` 
	LEFT JOIN `Members` ON `Borrowed_Books`.`Member_Id` = `Members`.`Member_Id` 
	LEFT JOIN `Books` ON `Borrowed_Books`.`Book_Id` = `Books`.`Book_Id`
     WHERE `Members`.`Member_Code` = '" . $_GET["Member_Code"] . "'";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "Member Code" . "\t" . "Member Name" . "\t". "Phone Number" . "\t". "Borrowed Book Name" . "\t". "Borrow Date" . "\t". "Borrowing Process Employee" . "\t". "Return Date" . "\t". "Returning Process Employee" . "\t";  
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
header("Content-Disposition: attachment; filename=Member Detail List.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 