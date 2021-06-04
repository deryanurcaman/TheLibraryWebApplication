<?php
include '../database/config.php';
$conn = OpenCon();

$username = $password = $check = '';        // initialize with empty string
$errors = array('grantor_name' => '', 'phone_number' => ''
, 'book_code' => '', 'book_name' => '', 'book_name' => '', 'book_name' => '', 'book_name' => ''); // keys and their ampty values


session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    if (empty($_POST['username'])) { 
        $errors['username'] = 'An username is required';
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'A password is required';
    } else {
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    }


    $table_name = "employees";
    $page_uri = "DatabasesProject-2021/frontend/mainpage.php";


    if (!empty($_POST['password']) && !empty($_POST['username'])) {
        $sql = 'SELECT Employee_id FROM '.$table_name.' WHERE Username = "'.$username.'" and password = "'.$password.'"';

        $result = mysqli_query($conn, $sql);
    
                
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $_SESSION['Username'] = $username;
            header("location: http://localhost/" . $page_uri);
        } else {
            $errors['check'] = "Your Login Username or Password is invalid";
        }
    }
    
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="grantors.css">
    <title>Grantors</title>
</head>

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


    <div class="main">

        <div class="Instructors_requests" id="Join">
            <h1 style="text-align: center;">Add A Grantor</h1>
            <hr><br>

            <form action="">

                <label>Grantor Information:</label><br>
                <hr>
                <label id="text_input">Grantor Name:</label>
                <input type="text" name="grantor_name" id="select"><br>
                <br>
                <label id="text_input">Grantor Phone Number:</label>
                <input type="text" name="phone_number" id="select"><br>
                <br><br>
                <label>Donated Book Information:</label><br>
                <hr>
                <label id="text_input">Book Code:</label>
                <input type="text" name="book_code" id="select"><br>
                <br>
                <label id="text_input"><label id="text_input">Book Name:</label>
                <input type="text" name="book_name" id="select"><br>
                <br>
                <label id="text_input">Author:</label>
                <input type="text" name="author" id="select"><br>
                <br>
                <label id="text_input">Type:</label>
                <input type="text" name="type" id="select"><br>
                <br>
                <label id="text_input">Number Of Edition:</label>
                <input type="text" name="edition" id="select"><br>
                <br>
                <label id="text_input">Quantity:</label>
                <input type="number" name="quantity" id="select" min="1"><br>
                <br>
                <label id="text_input">Date</label>
                <input type="date" name="date" id="select"><br>
                <br>

                <button id="submit" name="submit" type="submit">Add</button>

            </form>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span> Some text in the Modal..
        </div>

    </div>

</body>

</html>