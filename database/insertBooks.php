<?php

include 'config.php';
$conn = OpenCon();


$sql = "INSERT INTO Books (Book_Code, Book_Name, Author, Type, Num_Of_Edition, Status, Quantity, PublishingHouse_Name) VALUES (34001, 'The Shining', 'Stephen King', 'Science Fiction', 36, 0, 10, 'Hodder & Stoughton Ltd'), (34002, 'The Testaments', 'Margaret Atwood', 'Science Fiction', 2, 0, 2, 'Dell'), ( 34003, 'The Savior', 'J. R. Ward', 'Romance', 4, 0, 1, 'Gallery Books '), (34004, 'Royal Holiday', 'Jasmine Guillory', 'Romance', 2, 0, 6, ' Berkley'), (34005, 'The Haunting of Hill House', 'Shirley Jackson', 'Horror', 10, 0, 3, 'Penguin Classics'), (34006, 'Carrie', 'Stephen King', 'Horror', 24, 0, 17, 'Anchor'), (34007, 'A Beautiful Mind', 'Sylvia Nasar', 'Biography', 19, 0, 5, 'Simon & Schuster'), (34008, 'Alexander Hamilton', 'Ron Chernow', 'Biography', 34, 0, 21, 'Penguin Highbridge'), (34009, 'One Hundred Years of Solitude', 'Gabriel Garcia Marquez', 'Historical Fiction', 21, 0, 15, 'Harper Perennial'), (34010, 'The Help', 'Kathryn Stockett', 'Historical Fiction', 11, 0, 8, 'Berkley'), (34011, 'The Midnight Library', 'Matt Haig', 'Philosophical Fiction', 9, 0, 1, 'Viking'), (34012, 'The Four Winds', 'Kristin Hannah', 'Historical Fiction', 5, 0, 6, 'St. Martins Press'), (34013, 'The Return', 'Nicholas Sparks', 'Mystery', 12, 0, 3, 'Grand Central Publishing'), (34014, 'Think and Grow Rich', 'Napoleon Hill', 'Non-fiction', 9, 0, 37, 'Chartwell Books'), (34015, 'The Wrong Family', 'Tarryn Fisher', 'Psychological Thriller', 4, 0, 6, 'Graydon House'), (34016, 'Where the Crawdads Sing', 'Delia Owens', 'Literary Fiction', 10, 0, 4, 'G.P. Putnams Sons'), (34017, 'The Book of Lost Friends', 'Lisa Wingate', 'Historical Fiction', 15, 0, 8, 'Ballantine Books'), (34018, 'The Most Fun We Ever Had', 'Claire Lombardo', 'Literary Fiction', 3, 0, 2, 'Anchor'), (34019, 'The Housekeeper', 'Natalie Barelli', 'Psychological Thriller', 9, 0, 3, 'Anchor'), (34020, 'Chess Story', 'Stefan Zweig', 'Literary Fiction', 11, 0, 23, 'NYRB Classics'); ";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
