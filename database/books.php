<?php

//connect to database
$conn = mysqli_connect('localhost','webuser','123456','databasesproject2021');

if(!$conn){
    die ("Fail". mysqli_connect_error());
}
else{
    


$sqlString = "SELECT * FROM databasesproject2021.Book;";


$results = mysqli_query($conn, $sqlString); //çalıştırma kodu


while($row = mysqli_fetch_array($results)) {
    echo $row['Book_Name']; // Print a single column data
    echo print_r($row);       // Print the entire row data
}



$sqlString2 = "INSERT INTO Book (Book_Id, Id, Book_Name, Author, Type, Num_Of_Edition, Status, Quantity, Arrival_Date, PublishingHouse_Name) VALUES (546, 1, 'The', 'Stockett', 'Drama', 6, 0, 3, CAST('2007-05-08' AS datetime), 'bk'); ";

$results2 = mysqli_query($conn, $sqlString2);

echo "<br><br><br><br><br><br><br>";

$results = mysqli_query($conn, $sqlString); //çalıştırma kodu


while($row = mysqli_fetch_array($results)) {
    echo $row['Book_Name']; // Print a single column data
    echo print_r($row);       // Print the entire row data
}


//close the connection (database)
mysqli_close($conn);

}

?>