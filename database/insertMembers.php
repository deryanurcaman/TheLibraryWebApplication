<?php

$conn = mysqli_connect('localhost','webuser','123456','databasesproject2021',3308);
if(!$conn){
    die ("Fail connection". mysqli_connect_error());
}


$sql = "INSERT INTO Members (Member_Id, Member_Code, Book_Id, Member_Name, Member_Phone_Number, Borrowed_Book, Borrow_Date, Return_Date, Borrow_Duration) 
VALUES (1, '35001', (SELECT Book_Id FROM Books WHERE Book_Code = '34001'), 'Bill Weasley', '12331234570', (SELECT Book_Name FROM Books WHERE Book_Code = '34001'), CAST('2021-05-22' AS datetime), CAST('2021-05-30' AS datetime), 8), 
(2, '35002', (SELECT Book_Id FROM Books WHERE Book_Code = '34003'), 'Nymphadora Tonks', '12331234571', (SELECT Book_Name FROM Books WHERE Book_Code = '34003'), CAST('2021-03-21' AS datetime), CAST('2021-03-25' AS datetime), 4), 
(3, '35003', (SELECT Book_Id FROM Books WHERE Book_Code = '34005'), 'Orion Amari', '12331234572', (SELECT Book_Name FROM Books WHERE Book_Code = '34005'), CAST('2021-02-23' AS datetime), CAST('2021-02-28' AS datetime), 5), 
(4, '35004', (SELECT Book_Id FROM Books WHERE Book_Code = '34007'), 'Charlie Weasley', '12331234573', (SELECT Book_Name FROM Books WHERE Book_Code = '34007'), CAST('2021-03-30' AS datetime), CAST('2021-04-01' AS datetime), 2), 
(5, '35005', (SELECT Book_Id FROM Books WHERE Book_Code = '34009'), 'Jae Kim', '12331234574', (SELECT Book_Name FROM Books WHERE Book_Code = '34009'), CAST('2021-05-23' AS datetime), CAST('2021-05-27' AS datetime), 4), 
(6, '35006', (SELECT Book_Id FROM Books WHERE Book_Code = '34011'), 'Badeea Ali', '12331234575', (SELECT Book_Name FROM Books WHERE Book_Code = '34011'), CAST('2021-05-01' AS datetime), CAST('2021-05-08' AS datetime), 7), 
(7, '35007', (SELECT Book_Id FROM Books WHERE Book_Code = '34013'), 'Liz Tuttle', '12331234576', (SELECT Book_Name FROM Books WHERE Book_Code = '34013'), CAST('2021-05-11' AS datetime),  CAST('2021-05-14' AS datetime), 3), 
(8, '35008', (SELECT Book_Id FROM Books WHERE Book_Code = '34015'), 'Diego Caplan', '12331234577', (SELECT Book_Name FROM Books WHERE Book_Code = '34015'), CAST('2021-02-13' AS datetime), CAST('2021-02-20' AS datetime), 7), 
(9, '35009', (SELECT Book_Id FROM Books WHERE Book_Code = '34017'), 'Skye Parkin', '12331234578', (SELECT Book_Name FROM Books WHERE Book_Code = '34017'), CAST('2021-06-22' AS datetime), CAST('2021-06-24' AS datetime), 2), 
(10, '35010', (SELECT Book_Id FROM Books WHERE Book_Code = '34019'), 'Chiara Lobosca', '12331234579', (SELECT Book_Name FROM Books WHERE Book_Code = '34019'), CAST('2021-05-31' AS datetime), CAST('2021-06-03' AS datetime), 3);";



if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);


#
