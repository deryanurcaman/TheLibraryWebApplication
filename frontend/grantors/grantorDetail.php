<?php
include '../../database/config.php';
$conn = OpenCon();

$username = '';
session_start();
$username = $_SESSION['Username'];
$sql = 'SELECT * FROM Employees WHERE Username = "' . $username . '"';
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);


$sql1 = "SELECT * FROM `Grantors` 
        LEFT JOIN `Donated_Books` ON `Donated_Books`.`Grantor_Id` = `Grantors`.`Grantor_Id` 
        LEFT JOIN `Books` ON `Donated_Books`.`Book_Id` = `Books`.`Book_Id` 
        WHERE `Grantors`.`Grantor_Code` = '" . $_GET["Grantor_Code"] . "'";


$query1 = mysqli_query($conn, $sql1);
$rows1 = array();
while ($result1 = mysqli_fetch_array($query1)) {
    $rows1[] = $result1;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../members/members.css?v=<?php echo time(); ?>">
    <title>Grantors Detailed Info</title>
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
        <div><img src="../../assets/logo.png" height="150px" style="opacity: 0.8;"></img>
        </div>

        <br>
        <strong style="text-align:center;"><b style="font-size: 70px;">Welcome</b><br><?php echo $result['Employee_Name']; ?></strong>

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

    <div class="dropdown">
    <a href="exportDetail.php?Grantor_Code=<?php echo $_GET["Grantor_Code"];?>"><button class="dropbtn">Download List</button></a>
    </div>


    <div class="main">
        <div class="Instructors_requests">
            <h1><?php
                foreach ($rows1 as $row) {
                    echo $row["Grantor_Name"];
                    break;
                } ?>
            </h1><br>
            <table>
                <tr id="heads">
                    <th id="hashtag">#</th>
                    <th>Book Code</th>
                    <th>Book Name</th>
                    <th>Quantity</th>
                    <th>Donate Process Employee</th>

                </tr>
                <?php $j = 1;
                foreach ($rows1 as $row) {
                ?>
                    <tr>

                        <td><?php echo $j ?></td>
                        <td><?php echo $row["Book_Code"]; ?></td>
                        <td><?php echo $row["Book_Name"]; ?></td>
                        <td><?php echo $row["Donated_Quantity"]; ?></td>
                        <td><?php

                        $sql = "SELECT DISTINCT `Employee_Name` 
                        FROM `Donated_Books` 
                        LEFT JOIN `Employees` ON `Donated_Books`.`Donate_Employee` = `Employees`.`Employee_Id` 
                        WHERE `Donated_Books`.`Donate_Employee` = '" . $row["Donate_Employee"] . "'
                        ;";

                        $query = mysqli_query($conn, $sql);
                        $result = mysqli_fetch_array($query);
                        echo $result[0];

                        ?></td>
                    </tr>
                <?php $j = $j + 1;
                } ?>
            </table>
        </div>
        <br><br>


    </div>

</body>

</html>