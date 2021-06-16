//creating inital tables
<br>

<?php

include 'config.php';
$conn = OpenCon();

$errors = [];

$table1 = "CREATE TABLE Books(
    Book_Id INT(11) NOT NULL AUTO_INCREMENT,
    Book_Code VARCHAR(100),
    Book_Name VARCHAR(100),
    Author VARCHAR(100),
    Type VARCHAR(100),
    Num_of_Edition INT(11),
    Quantity INT(11),
    PublishingHouse_Name VARCHAR(100), 
    PRIMARY KEY (Book_Id));";

$table2 = "CREATE TABLE Grantors(
    Grantor_Id INT(11) NOT NULL AUTO_INCREMENT,
    Grantor_Code VARCHAR(100),
    Grantor_Name VARCHAR(100), 
    Grantor_Phone_Number VARCHAR(11), 
    PRIMARY KEY (Grantor_Id));";

$table3 = "CREATE TABLE Members(
    Member_Id INT(11) NOT NULL AUTO_INCREMENT,
    Member_Code VARCHAR(100),
    Member_Name VARCHAR(100), 
    Member_Phone_Number VARCHAR(11), 
    PRIMARY KEY(Member_Id));";

$table4 = "CREATE TABLE Employees(
    Employee_Id INT(11) NOT NULL AUTO_INCREMENT,
    Employee_Code VARCHAR(100),
    Employee_Name VARCHAR(100), 
    Employee_Phone_Number VARCHAR(11), 
    Sex VARCHAR(6),
    Username VARCHAR(100),
    Password VARCHAR(100),
    PRIMARY KEY (Employee_Id));";

$table5 = "CREATE TABLE Transactions(
    Transactions_Id INT(11) NOT NULL AUTO_INCREMENT,
    Member_Id INT(11),
    Employee_Id INT(11),
    Case_Name VARCHAR(100),
    PRIMARY KEY (Transactions_Id),
    FOREIGN KEY (Member_Id) REFERENCES Members(Member_Id) ON DELETE CASCADE, 
    FOREIGN KEY (Employee_Id) REFERENCES Employees(Employee_Id) ON DELETE CASCADE);";

$table6 = "CREATE TABLE Borrowed_Books(
    Borrowed_Books_Id INT(11) NOT NULL AUTO_INCREMENT,
    Book_Id INT(11),
    Member_Id INT(11),
    Borrow_Date DATE, 
    Return_Date DATE, 
    PRIMARY KEY (Borrowed_Books_Id),
    FOREIGN KEY (Book_Id) REFERENCES Books(Book_Id) ON DELETE CASCADE, 
    FOREIGN KEY (Member_Id) REFERENCES Members(Member_Id) ON DELETE CASCADE);";


$table7= "CREATE TABLE Donated_Books(
    Donated_Books_Id INT(11) NOT NULL AUTO_INCREMENT,
    Book_Id INT(11) NOT NULL,
    Grantor_Id INT(11) NOT NULL,
    PRIMARY KEY (Donated_Books_Id),
    FOREIGN KEY (Book_Id) REFERENCES Books(Book_Id) ON DELETE CASCADE, 
    FOREIGN KEY (Grantor_Id) REFERENCES Grantors(Grantor_Id) ON DELETE CASCADE);";




$tables = [$table1, $table2, $table3, $table4, $table5, $table6, $table7];


foreach ($tables as $k => $sql) {
    $query = @$conn->query($sql);

    if (!$query)
        $errors[] = "Table $k : Creation failed ($conn->error)";
    else
        $errors[] = "Table $k : Creation done succesfully";
}


foreach ($errors as $msg) {
    echo "$msg <br>";
}

mysqli_close($conn);
?>