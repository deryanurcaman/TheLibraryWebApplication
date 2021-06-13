<?php

include 'config.php';
$conn = OpenCon();


$sql = "INSERT INTO Books (Book_Code, Book_Name, Author, Type, Num_Of_Edition, Status, Quantity, PublishingHouse_Name) VALUES 
('BK1', 'The Shining', 'Stephen King', 'Science Fiction', 36, 0, 10, 'Hodder & Stoughton Ltd'), 
('BK2', 'The Testaments', 'Margaret Atwood', 'Science Fiction', 2, 0, 2, 'Dell'), 
('BK3', 'The Savior', 'J. R. Ward', 'Romance', 4, 0, 1, 'Gallery Books '), 
('BK4', 'Royal Holiday', 'Jasmine Guillory', 'Romance', 2, 0, 6, ' Berkley'), 
('BK5', 'The Haunting of Hill House', 'Shirley Jackson', 'Horror', 10, 0, 3, 'Penguin Classics'), 
('BK6', 'Carrie', 'Stephen King', 'Horror', 24, 0, 17, 'Anchor'), 
('BK7', 'A Beautiful Mind', 'Sylvia Nasar', 'Biography', 19, 0, 5, 'Simon & Schuster'), 
('BK8', 'Alexander Hamilton', 'Ron Chernow', 'Biography', 34, 0, 21, 'Penguin Highbridge'), 
('BK9', 'One Hundred Years of Solitude', 'Gabriel Garcia Marquez', 'Historical Fiction', 21, 0, 15, 'Harper Perennial'), 
('BK10', 'The Help', 'Kathryn Stockett', 'Historical Fiction', 11, 0, 8, 'Berkley'), 
('BK11', 'The Midnight Library', 'Matt Haig', 'Philosophical Fiction', 9, 0, 1, 'Viking'), 
('BK12', 'The Four Winds', 'Kristin Hannah', 'Historical Fiction', 5, 0, 6, 'St. Martins Press'), 
('BK13', 'The Return', 'Nicholas Sparks', 'Mystery', 12, 0, 3, 'Grand Central Publishing'), 
('BK14', 'Think and Grow Rich', 'Napoleon Hill', 'Non-fiction', 9, 0, 37, 'Chartwell Books'), 
('BK15', 'The Wrong Family', 'Tarryn Fisher', 'Psychological Thriller', 4, 0, 6, 'Graydon House'), 
('BK16', 'Where the Crawdads Sing', 'Delia Owens', 'Literary Fiction', 10, 0, 4, 'G.P. Putnams Sons'), 
('BK17', 'The Book of Lost Friends', 'Lisa Wingate', 'Historical Fiction', 15, 0, 8, 'Ballantine Books'), 
('BK18', 'The Most Fun We Ever Had', 'Claire Lombardo', 'Literary Fiction', 3, 0, 2, 'Anchor'), 
('BK19', 'The Housekeeper', 'Natalie Barelli', 'Psychological Thriller', 9, 0, 3, 'Anchor'), 
('BK20', 'Chess Story', 'Stefan Zweig', 'Literary Fiction', 11, 0, 23, 'NYRB Classics'); ";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
