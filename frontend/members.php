<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="members.css">
    <title>Members</title>
</head>

<script>
    function save() {
        alert("The Request Is Successfully Sent");
    }
</script>

<?php 
$conn = mysqli_connect('localhost','webuser','123456','databasesproject2021');
if(!$conn){
    die ("Fail". mysqli_connect_error());
}
$sqlString = "SELECT * FROM Members;";
$query = mysqli_query($conn, $sqlString);
$rows = array();
while($result = mysqli_fetch_array($query))
{
    $rows[] = $result;
}
?>

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
                    <a href="http://localhost/DatabasesProject-2021/frontend/mainpage.php"></a>
                </td>

                <td> <a id="icon1" href="http://localhost/DatabasesProject-2021/frontend/mainpage.php">Main Page</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/DatabasesProject-2021/frontend/books.php"></a>
                </td>

                <td> <a id="icon2" href="http://localhost/DatabasesProject-2021/frontend/books.php">Books</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/DatabasesProject-2021/frontend/members.php"></a>
                </td>

                <td> <a id="icon3" href="http://localhost/DatabasesProject-2021/frontend/members.php">Members</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/DatabasesProject-2021/frontend/grantors.php"></a>
                </td>

                <td> <a id="icon3" href="http://localhost/DatabasesProject-2021/frontend/grantors.php">Grantors</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/DatabasesProject-2021/frontend/employees.php"></a>
                </td>

                <td> <a id="icon3" href="http://localhost/DatabasesProject-2021/frontend/employees.php">Employees</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/DatabasesProject-2021/frontend/login.php"></a>
                </td>

                <td><a id="icon4" href="http://localhost/DatabasesProject-2021/frontend/login.php">Log Out</a></td>
            </tr>
        </table>


    </div>

    <div class="dropdown">
        <button class="dropbtn">Select</button>
        <div class="dropdown-content">
            <a href="#">Members</a>
            <a href="#Serve">Serve to The Member</a>
        </div>
    </div>
    <br>

    <div class="main">

        <div class="Instructors_requests">
            <h1>Members</h1><br>
            <table>
                <tr id="heads">
                    <th>Detailed Information</th>
                    <th id="hashtag">#</th>
                    <th>Member Code</th>
                    <th>Member Name</th>
                    <th>Member Phone Number</th>
                    <th>Borrowed Book</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Borrow Duration</th>
                    <th>Delete</th>
                </tr>
                <?php
                    foreach($rows as $row){
                        echo
                            '<tr>
                                <td> </td>
                                <td> '.$row['Member_Id'].'</td>
                                <td> '.$row['Member_Code'].'</td>
                                <td> '.$row['Member_Name'].' </td>
                                <td> '.$row['Member_Phone_Number'].' </td>
                                <td> '.$row['Borrowed_Book'].' </td>
                                <td> '.$row['Borrow_Date'].' </td>
                                <td> '.$row['Return_Date'].' </td>
                                <td> '.$row['Borrow_Duration'].' days </td>
                                <td>  </td>
                                <td> </td>
                            </tr>';
                    }
                ?> 
            </table>

        </div>
        <br><br>

        <div class="Instructors_requests" id="Serve">
            <h1 style="text-align: center;">Serve to The Member</h1>
            <hr><br>

            <form action="">

                <label>Member Information:</label><br>
                <hr>
                <label id="text_input">Member Name:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input">Member Id:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input">Member Phone Number:</label>
                <input type="text" name="" id="select"><br>
                <br><br>
                <label>Borrowed Book Information:</label><br>
                <hr>
                <label id="text_input">Book Id:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input"><label id="text_input">Book Name:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input">Quantity:</label>
                <input type="number" name="" id="select" min="1"><br>
                <br>
                <label id="text_input">Date</label>
                <input type="date" name="" id="select"><br>
                <br>

                <button onclick="save()" id="submit" type="submit">Serve</button>

            </form>
        </div>
    </div>
</body>

</html>