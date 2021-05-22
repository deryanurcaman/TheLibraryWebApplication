//creating inital tables
<br>

<?php

$conn = mysqli_connect('localhost', 'webuser', '123456', 'databasesproject2021');
if (!$conn) {
    die("Fail connection" . mysqli_connect_error());
}

$errors = [];

$table1 = "CREATE TABLE Books(
    Book_Id INT NOT NULL,
    Book_Code VARCHAR(100) NOT NULL,
    Book_Name VARCHAR(100) NOT NULL,
    Author VARCHAR(100) NOT NULL,
    Type VARCHAR(100),
    Num_of_Edition INT NOT NULL,
    Status BOOLEAN NOT NULL,
    Quantity INT NOT NULL,
    Arrival_Date DATE NOT NULL,
    PublishingHouse_Name VARCHAR(100) NOT NULL, 
    PRIMARY KEY (Book_Id));";

$table2 = "CREATE TABLE Grantors(
    Grantor_Id INT NOT NULL,
    Grantor_Code VARCHAR(100) NOT NULL,
    Grantor_Name VARCHAR(100) NOT NULL, 
    Grantor_Phone_Number VARCHAR(11), 
    Book_Id INT NOT NULL,
    Donated_Book VARCHAR(100) NOT NULL, 
    PRIMARY KEY (Grantor_Id),
    FOREIGN KEY (Book_Id) REFERENCES Books(Book_Id));";

$table3 = "CREATE TABLE Members(
    Member_Id INT NOT NULL,
    Member_Code VARCHAR(100) NOT NULL,
    Book_Id INT NOT NULL,
    Member_Name VARCHAR(100) NOT NULL, 
    Member_Phone_Number VARCHAR(11), 
    Borrowed_Book VARCHAR(100) NOT NULL, 
    Borrow_Date DATE NOT NULL, 
    Return_Date DATE NOT NULL, 
    Borrow_Duration INT NOT NULL,
    PRIMARY KEY (Member_Id),
    FOREIGN KEY (Book_Id) REFERENCES Books(Book_Id));";

$table4 = "CREATE TABLE Employees(
    Employee_Id INT NOT NULL,
    Employee_Code VARCHAR(100) NOT NULL,
    Member_Id INT NOT NULL,
    Employee_Name VARCHAR(100) NOT NULL, 
    Employee_Phone_Number VARCHAR(11), 
    Sex VARCHAR(6),
    Salary VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Password VARCHAR(100) NOT NULL,
    PRIMARY KEY (Employee_Id),
    FOREIGN KEY (Member_Id) REFERENCES Members(Member_Id));";

$table5 = "CREATE TABLE Maintains(
    Book_id INT NOT NULL,
    Employee_Id INT NOT NULL,
    FOREIGN KEY (Book_Id) REFERENCES Books(Book_Id), 
    FOREIGN KEY (Employee_Id) REFERENCES Employees(Employee_Id));";

$tables = [$table1, $table2, $table3, $table4, $table5,];


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