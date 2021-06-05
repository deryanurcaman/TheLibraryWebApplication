<?php 
include '../database/config.php';
$conn = OpenCon();

$username = '';
session_start();
$username = $_SESSION['Username'];
$sql = 'SELECT * FROM Employees WHERE Username = "' . $username . '"';
$query = mysqli_query($conn, $sql);
$result2 = mysqli_fetch_array($query);

// $sqlString = "SELECT * FROM employees;";
// $query = mysqli_query($conn, $sqlString);
// $rows = array();
// while($result = mysqli_fetch_array($query))
// {
//     $rows[] = $result;
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css?v=<?php echo time(); ?>">
    <title>Main Page</title>
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
        <div><img src="../assets/logo.png" height="150px" style="opacity: 0.8;"></img>
        </div>

        <br>
        <strong style="text-align:center;"><b style="font-size: 70px;">Welcome</b><br><?php echo $result2['Employee_Name']; ?></strong>

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

    <!-- Page content -->
    <div class="main">
        <div class="div1">

            <a href="./books/addBooks.php"><button style="float: left;font-size: 18px; margin-left: 50px"><img src="../assets/course_siyah.png" alt=""> <br>Add A New Book Into The Inventory</button></a>
            <a href="./members/addMember.php"><button style=" float: left; margin-left: 2em; font-size: 18px;"><img src="../assets/adding_member.png" alt=""> <br>Add A New Member</button></a>
            <a href="./grantors/addGrantor.php"><button style=" float: left; margin-left: 2em; font-size: 18px;"><img src="../assets/add_grantor.png" alt=""> <br>Add A New Grantor</button></a>
            <br> <br> <br><br> <br>
            <a href="./members/serveMember.php"><button style=" float: left;font-size: 18px; margin-top: 50px; margin-left: 50px"><img src="../assets/serve_member.png" alt=""> <br>Serve A Book To The Member</button></a>
            <a href="./members/returnMember.php"><button style=" float: left; margin-left: 2em; font-size: 18px; margin-top: 50px;"><img src="../assets/return.png" alt=""> <br>Return The Book From The Member</button></a>
            <a href="./grantors/addBookOfGrantor.php"><button style=" float: left; margin-left: 2em; font-size: 18px; margin-top: 50px;"><img src="../assets/donated_book.png" alt=""> <br>Add The Book Donated By A Grantor</button></a>
            <br> <br> <br><br> <br>
            <a href="./employees/addEmployee.php"><button style=" float: left;font-size: 18px; margin-top: 50px; margin-left: 50px"><img src="../assets/add_employee.png" alt=""> <br>Add A New Employee</button></a>
            
        </div>

        
    </div>


</body>

</html>