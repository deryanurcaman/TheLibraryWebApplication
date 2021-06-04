<?php 
include '../../database/config.php';
$conn = OpenCon();

$sqlString = "SELECT * FROM Books;";
$query = mysqli_query($conn, $sqlString);
$rows = array();
while($result = mysqli_fetch_array($query))
{
    $rows[] = $result;
}
?>

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
    <div><img src="../../assets/logo.png" height="150px" style="opacity: 0.8;"></img>
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
                    <a href="http://localhost/DatabasesProject-2021/frontend/books/books.php"></a>
                </td>

                <td> <a id="icon2" href="http://localhost/DatabasesProject-2021/frontend/books/books.php">Books</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/DatabasesProject-2021/frontend/members/members.php"></a>
                </td>

                <td> <a id="icon3" href="http://localhost/DatabasesProject-2021/frontend/members/members.php">Members</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/DatabasesProject-2021/frontend/grantors/grantors.php"></a>
                </td>

                <td> <a id="icon3" href="http://localhost/DatabasesProject-2021/frontend/grantors/grantors.php">Grantors</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/DatabasesProject-2021/frontend/employees/employees.php"></a>
                </td>

                <td> <a id="icon3" href="http://localhost/DatabasesProject-2021/frontend/employees/employees.php">Employees</a>
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
            <h1 style="text-align: center;">Add A Book</h1>
            <hr><br>

            <form action="../database/books.php">
            <label id="text_input"><label id="text_input">Book Code:</label>
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