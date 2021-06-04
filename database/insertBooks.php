<?php

include 'config.php';
$conn = OpenCon();


$sql = "INSERT INTO Books (Book_Id, Book_Code, Book_Name, Author, Type, Num_Of_Edition, Status, Quantity, Arrival_Date, PublishingHouse_Name) VALUES (1, 34001, 'The Shining', 'Stephen King', 'Science Fiction', 36, 0, 10, CAST('2021-05-13' AS datetime), 'Hodder & Stoughton Ltd'), (2, 34002, 'The Testaments', 'Margaret Atwood', 'Science Fiction', 2, 0, 2, CAST('2021-01-03' AS datetime), 'Dell'), (3, 34003, 'The Savior', 'J. R. Ward', 'Romance', 4, 0, 1, CAST('2021-03-18' AS datetime), 'Gallery Books '), (4, 34004, 'Royal Holiday', 'Jasmine Guillory', 'Romance', 2, 0, 6, CAST('2021-05-21' AS datetime), ' Berkley'), (5, 34005, 'The Haunting of Hill House', 'Shirley Jackson', 'Horror', 10, 0, 3, CAST('2021-02-18' AS datetime), 'Penguin Classics'), (6, 34006, 'Carrie', 'Stephen King', 'Horror', 24, 0, 17, CAST('2021-04-08' AS datetime), 'Anchor'), (7, 34007, 'A Beautiful Mind', 'Sylvia Nasar', 'Biography', 19, 0, 5, CAST('2021-03-23' AS datetime), 'Simon & Schuster'), (8, 34008, 'Alexander Hamilton', 'Ron Chernow', 'Biography', 34, 0, 21, CAST('2021-04-07' AS datetime), 'Penguin Highbridge'), (9, 34009, 'One Hundred Years of Solitude', 'Gabriel Garcia Marquez', 'Historical Fiction', 21, 0, 15, CAST('2021-05-21' AS datetime), 'Harper Perennial'), (10, 34010, 'The Help', 'Kathryn Stockett', 'Historical Fiction', 11, 0, 8, CAST('2021-05-14' AS datetime), 'Berkley'), (11, 34011, 'The Midnight Library', 'Matt Haig', 'Philosophical Fiction', 9, 0, 1, CAST('2021-02-24' AS datetime), 'Viking'), (12, 34012, 'The Four Winds', 'Kristin Hannah', 'Historical Fiction', 5, 0, 6, CAST('2021-05-01' AS datetime), 'St. Martins Press'), (13, 34013, 'The Return', 'Nicholas Sparks', 'Mystery', 12, 0, 3, CAST('2021-04-13' AS datetime), 'Grand Central Publishing'), (14, 34014, 'Think and Grow Rich', 'Napoleon Hill', 'Non-fiction', 9, 0, 37, CAST('2021-03-06' AS datetime), 'Chartwell Books'), (15, 34015, 'The Wrong Family', 'Tarryn Fisher', 'Psychological Thriller', 4, 0, 6, CAST('2021-01-29' AS datetime), 'Graydon House'), (16, 34016, 'Where the Crawdads Sing', 'Delia Owens', 'Literary Fiction', 10, 0, 4, CAST('2021-02-09' AS datetime), 'G.P. Putnams Sons'), (17, 34017, 'The Book of Lost Friends', 'Lisa Wingate', 'Historical Fiction', 15, 0, 8, CAST('2021-05-15' AS datetime), 'Ballantine Books'), (18, 34018, 'The Most Fun We Ever Had', 'Claire Lombardo', 'Literary Fiction', 3, 0, 2, CAST('2021-04-30' AS datetime), 'Anchor'), (19, 34019, 'The Housekeeper', 'Natalie Barelli', 'Psychological Thriller', 9, 0, 3, CAST('2021-05-12' AS datetime), 'Anchor'), (20, 34020, 'Chess Story', 'Stefan Zweig', 'Literary Fiction', 11, 0, 23, CAST('2021-01-11' AS datetime), 'NYRB Classics'); ";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
