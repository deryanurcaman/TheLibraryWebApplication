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
include '../database/config.php';
$conn = OpenCon();

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

    <div class="main">

        <div class="Instructors_requests" id="Serve">
            <h1 style="text-align: center;">Serve to The Member</h1>
            <hr><br>

            <form action="">

                <label>Member Information:</label><br>
                <hr>
                <label id="text_input">Member Name:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input">Member Code:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input">Member Phone Number:</label>
                <input type="text" name="" id="select"><br>
                <br><br>
                <label>Borrowed Book Information:</label><br>
                <hr>
                <label id="text_input">Book Code:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input"><label id="text_input">Book Name:</label>
                <input type="text" name="" id="select"><br>
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