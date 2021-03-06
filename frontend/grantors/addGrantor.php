<?php
include '../../database/config.php';
$conn = OpenCon();

$username = '';
session_start();
$username = $_SESSION['Username'];
$sql = 'SELECT * FROM Employees WHERE Username = "' . $username . '"';
$query = mysqli_query($conn, $sql);
$result2 = mysqli_fetch_array($query);


$sqlString = "SELECT * FROM Grantors;";
$query = mysqli_query($conn, $sqlString);
$rows = array();
while ($result = mysqli_fetch_array($query)) {
    $rows[] = $result;
}

$Grantor_NameN = $Grantor_CodeN = $Grantor_Phone_NumberN = $Book_CodeN = $Book_NameN = $DateN = '';        // initialize with empty string
$errors = array('check' => '','Grantor_Name' => '', 'Grantor_Code' => '', 'Grantor_Phone_Number' => ''); // keys and their ampty values
if (isset($_POST['submit'])) {
    if (empty($_POST['Grantor_Name'])) {
        $errors['Grantor_Name'] = 'Grantor name is required';
    } else {
        $Grantor_NameN = $_POST['Grantor_Name'];
    }
    if (empty($_POST['Grantor_Code'])) {
        $errors['Grantor_Code'] = 'Grantor code is required';
    } else {
        $Grantor_CodeN = $_POST['Grantor_Code'];
    }
    if (empty($_POST['Grantor_Phone_Number'])) {
        $errors['Grantor_Phone_Number'] = 'Grantor phone number is required';
    } else {
        $Grantor_Phone_NumberN = $_POST['Grantor_Phone_Number'];
    }


    if (array_filter($errors)) {
    } else {

        if (!empty($_POST['Grantor_Name']) && !empty($_POST['Grantor_Code']) && !empty($_POST['Grantor_Phone_Number'])) {

            $sqlcheck = "SELECT * FROM grantors WHERE Grantor_Code = '$Grantor_CodeN'";

            $resultcheck = mysqli_query($conn, $sqlcheck);


            $row = mysqli_fetch_array($resultcheck, MYSQLI_ASSOC);

            $count = mysqli_num_rows($resultcheck);

            if ($count == 1) {
                $errors['check'] = 'The code is already taken.';
            } else {


                $sqlNew = "INSERT INTO Grantors ( Grantor_Code, Grantor_Name, Grantor_Phone_Number) 
    VALUES ( '$Grantor_CodeN', '$Grantor_NameN', '$Grantor_Phone_NumberN');";




                if (mysqli_query($conn, $sqlNew)) {
                    echo "added a grantor successfully";
                } else {
                    echo "Error: " . $sqlNew . "<br>" . mysqli_error($conn);
                }
                header('Location: http://localhost/DatabasesProject-2021/frontend/grantors/grantors.php');
                exit;
            }
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
    <link rel="stylesheet" href="grantors.css?v=<?php echo time(); ?>">
    <title>Add A New Grantor</title>
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


    <div class="main">

        <div class="Instructors_requests" id="Join">
            <h1 style="text-align: center;">Add A New Grantor</h1>
            <hr><br>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label id="text_input">Grantor Name/Surname:</label>
                <input type="text" name="Grantor_Name" placeholder="Enter Grantor Name and Surname" class="select" value="<?php echo htmlspecialchars($Grantor_NameN); ?>">

                <div style="color: #581845;font-size:15px; font-weight:600;">
                    <?php echo $errors['Grantor_Name']; ?>
                </div>
                <br>
                <label id="text_input">Grantor Code:</label>
                <input type="text" name="Grantor_Code" placeholder="Enter Grantor Code" class="select" value="<?php echo htmlspecialchars($Grantor_CodeN); ?>">

                <div style="color: #581845;font-size:15px; font-weight:600;">
                    <?php echo $errors['Grantor_Code']; ?>
                </div>
                <br>
                <label id="text_input">Grantor Phone Number:</label>
                <input type="text" name="Grantor_Phone_Number" placeholder="Enter Grantor Phone Number" class="select" value="<?php echo htmlspecialchars($Grantor_Phone_NumberN); ?>">

                <div style="color: #581845;font-size:15px; font-weight:600;">
                    <?php echo $errors['Grantor_Phone_Number']; ?>
                </div>
                <br>
                <div style="color: #581845;font-size:15px; font-weight:600;">
                    <?php echo $errors['check']; ?>
                </div>
                <br>


                <button id="buton" name="submit" type="submit">Add</button>

            </form>
        </div>
    </div>

</body>

</html>