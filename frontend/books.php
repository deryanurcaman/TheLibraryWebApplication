<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="books.css">
    <title>Books</title>
</head>

<script>
    function save() {
        alert("The Request Is Successfully Sent");
    }
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Domine&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Stalemate&display=swap');
    body {
        font-family: 'Domine', serif;
    }
    
    strong {
        font-family: 'Domine', serif;
        font-size: 25px;
    }
    
    body b {
        font-family: 'Stalemate', cursive;
        font-size: 50px;
    }
</style>

<body>
    <!-- Side navigation -->
    <div class="sidenav">
        <div><img src="../frontend/assets/logo.png" height="150px" style="opacity: 0.8;"></img>
        </div>

        <br>
        <strong style="text-align:center;"><b style="font-size: 70px;">Welcome</b> Luna Lovegood</strong>

        <br>
        <hr style="border-color: white;">

        <table id="tablenavbar">
            <tr id="hv">
                <td>
                    <a href="mainpage.html"></a>
                </td>

                <td> <a id="icon1" href="mainpage.html">Main Page</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="books.html"></a>
                </td>

                <td> <a id="icon2" href="books.html">Books</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="members.html"></a>
                </td>

                <td> <a id="icon3" href="members.html">Members</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="grantors.html"></a>
                </td>

                <td> <a id="icon3" href="grantors.html">Grantors</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="employees.html"></a>
                </td>

                <td> <a id="icon3" href="employees.html">Employees</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="login.html"></a>
                </td>

                <td><a id="icon4" href="login.html">Log Out</a></td>
            </tr>
        </table>


    </div>

    <div class="dropdown">
        <button class="dropbtn">Select</button>
        <div class="dropdown-content">
            <a href="#">Books</a>
            <a href="#Join">Add A Book</a>
        </div>
    </div>
    <br>
    <?php 
                //connect to database
$conn = mysqli_connect('localhost','webuser','123456','databasesproject2021',3308);

if(!$conn){
    die ("Fail". mysqli_connect_error());
}
else{
    


$sqlString = "SELECT * FROM Book;";

$query = mysqli_query($conn, $sqlString);

$rows = array();
while($result = mysqli_fetch_array($query))
{
    $rows[] = $result;
}
    ?>
    <div class="main">

        <div class="Instructors_requests">
            <h1>Books</h1><br>
            <table>
                <tr id="heads">
                    <th id="hashtag">#</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Type</th>
                    <th>Number of Edition</th>
                    <th>Status</th>
                    <th>Quantity</th>
                    <th>Arrival Date</th>
                    <th>Delete</th>
                </tr>

                <?php

                foreach($rows as $row){
                    echo
                        '<tr>
                            <td>34001</td>
                            <td> '.$row['Book_Name'].'</td>
                            <td>Stephen King</td>
                            <td>Science Fiction</td>
                            <td>36th</td>
                            <td>-</td>
                            <td>10</td>
                            <td>13.05.2021</td>
                        </tr>';
                }
                
?>

            
                <!-- <tr>
                    <td id="hashtag">34001</td>
                    <td>The Shining</td>
                    <td>Stephen King</td>
                    <td>Science Fiction</td>
                    <td>36th</td>
                    <td>-</td>
                    <td>10</td>
                    <td>13.05.2021</td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
                <tr>
                    <td id="hashtag">34002</td>
                    <td>The Testaments</td>
                    <td>Margaret Atwood</td>
                    <td>Science Fiction</td>
                    <td>2nd</td>
                    <td>-</td>
                    <td>2</td>
                    <td>13.05.2021</td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
                <tr>
                    <td id="hashtag">34003</td>
                    <td>The Savior</td>
                    <td>J.R. Ward</td>
                    <td>Romance</td>
                    <td>4th</td>
                    <td>-</td>
                    <td>1</td>
                    <td>13.05.2021</td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
                <tr>
                    <td id="hashtag">34004</td>
                    <td>Royal Holiday</td>
                    <td>Jasmine Guillory</td>
                    <td>Romance</td>
                    <td>2nd</td>
                    <td>-</td>
                    <td>6</td>
                    <td>13.05.2021</td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
                <tr>
                    <td id="hashtag">34005</td>
                    <td>The Haunting of Hill House</td>
                    <td>Shirley Jackson</td>
                    <td>Horror</td>
                    <td>10th</td>
                    <td>-</td>
                    <td>3</td>
                    <td>04.05.2020</td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
                <tr>
                    <td id="hashtag">34006</td>
                    <td>Carrie</td>
                    <td>Stephen King</td>
                    <td>Horror</td>
                    <td>24th</td>
                    <td>-</td>
                    <td>17</td>
                    <td>13.05.2021</td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
                <tr>
                    <td id="hashtag">34007</td>
                    <td>A Beautiful Mind</td>
                    <td>Sylvia Nasar</td>
                    <td>Biography</td>
                    <td>19th</td>
                    <td>-</td>
                    <td>5</td>
                    <td>13.05.2021</td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
                <tr>
                    <td id="hashtag">34008</td>
                    <td>Alexander Hamilton</td>
                    <td>Ron Chernow</td>
                    <td>Biography</td>
                    <td>34th</td>
                    <td>-</td>
                    <td>21</td>
                    <td>13.05.2021</td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
                <tr>
                    <td id="hashtag">34009</td>
                    <td>One Hundred Years of Solitude</td>
                    <td>Gabriel Garcia Marquez</td>
                    <td>Historical Fiction</td>
                    <td>21th</td>
                    <td>-</td>
                    <td>15</td>
                    <td>13.01.2020</td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
                <tr>
                    <td id="hashtag">34010</td>
                    <td>The Help</td>
                    <td>Katdryn Stockett</td>
                    <td>Historical Fiction</td>
                    <td>11th</td>
                    <td>-</td>
                    <td>8</td>
                    <td>13.05.2021</td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>


                </tr> -->
            </table>

        </div>
        <br><br>

        <div class="Instructors_requests" id="Join">
            <h1 style="text-align: center;">Add A Book</h1>
            <hr><br>

            <form action="../database/books.php">

                <label id="text_input">Book Id:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input"><label id="text_input">Book Name:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input">Author:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input">Type:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input">Number Of Edition:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input">Quantity:</label>
                <input type="number" name="" id="select" min="1"><br>
                <br>
                <label id="text_input">Date</label>
                <input type="date" name="" id="select"><br>
                <br>

                <button onclick="save()" id="submit" type="submit">Add</button>

            </form>
        </div>
    </div>
</body>

</html>




<?php


// while($row = mysqli_fetch_array($results)) {
//     echo $row['Book_Name']; // Print a single column data
//     echo print_r($row);       // Print the entire row data
// }



//$sqlString2 = "INSERT INTO Book (Book_Id, Id, Book_Name, Author, Type, Num_Of_Edition, Status, Quantity, Arrival_Date, PublishingHouse_Name) VALUES (546, 1, 'The', 'Stockett', 'Drama', 6, 0, 3, CAST('2007-05-08' AS datetime), 'bk'); ";
//$sqlString2 = "INSERT INTO Book (Book_Id, Id, Book_Name, Author, Type, Num_Of_Edition, Status, Quantity, Arrival_Date, PublishingHouse_Name) VALUES (765, 1, 'Harry Potter', 'JK Rowling', 'Ficiton', 6, 0, 3, CAST('2007-05-08' AS datetime), 'bk'); ";
//$sqlString2 = "INSERT INTO Book (Book_Id, Id, Book_Name, Author, Type, Num_Of_Edition, Status, Quantity, Arrival_Date, PublishingHouse_Name) VALUES (765, 1, 'Satranç', 'Zweig', 'RealLife', 6, 0, 3, CAST('2007-05-08' AS datetime), 'BKM'); ";


//$results2 = mysqli_query($conn, $sqlString2);

// echo "<br><br><br><br><br><br><br>";

// $results = mysqli_query($conn, $sqlString); //çalıştırma kodu


// while($row = mysqli_fetch_array($results)) {
//     echo $row['Book_Name']; // Print a single column data
//     echo print_r($row);       // Print the entire row data
// }


//close the connection (database)
mysqli_close($conn);

}

?>