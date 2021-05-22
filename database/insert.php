<?php

$conn = mysqli_connect('localhost','webuser','123456','databasesproject2021',3308);
if(!$conn){
    die ("Fail connection". mysqli_connect_error());
}


$sqlString = "INSERT INTO Books (Book_Id, Id, Book_Name, Author, Type, Num_Of_Edition, Status, Quantity, Arrival_Date, PublishingHouse_Name) VALUES (765, 1, 'Harry Potter', 'JK Rowling', 'Ficiton', 6, 0, 3, CAST('2007-05-08' AS datetime), 'bkm'); ";

$results = mysqli_query($conn, $sqlString);

mysqli_close($conn);
?>