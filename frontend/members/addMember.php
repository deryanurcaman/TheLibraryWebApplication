<?php 
include '../../database/config.php';
$conn = OpenCon();

$username = '';
session_start();
$username = $_SESSION['Username'];
$sql = 'SELECT * FROM Employees WHERE Username = "' . $username . '"';
$query = mysqli_query($conn, $sql);
$result2 = mysqli_fetch_array($query);

$sqlString = "SELECT * FROM Members;";
$query = mysqli_query($conn, $sqlString);
$rows = array();
while($result = mysqli_fetch_array($query))
{
    $rows[] = $result;
}



$Member_Name = $Member_Code = $Member_Phone_Number = $Book_Code = $Book_Name = $Date = '';        // initialize with empty string
$errors = array('Member_Name' => '', 'Member_Code' => '', 'Member_Phone_Number' => ''); // keys and their ampty values
if (isset($_POST['submit'])) {
    if (empty($_POST['Member_Name'])) {
        $errors['Member_Name'] = 'Member name is required';
    } else {
        $Member_Name = $_POST['Member_Name'];
    }
    if (empty($_POST['Member_Code'])) {
        $errors['Member_Code'] = 'Member code is required';
    } else {
        $Member_Code = $_POST['Member_Code'];
    }
    if (empty($_POST['Member_Phone_Number'])) {
        $errors['Member_Phone_Number'] = 'Member phone number is required';
    } else {
        $Member_Phone_Number = $_POST['Member_Phone_Number'];
    }
    

    if(array_filter($errors)) {
        // echo 'errors in the form';
    } else {
        // echo 'no errors in the form';

    if (!empty($_POST['Member_Name']) && !empty($_POST['Member_Code']) && !empty($_POST['Member_Phone_Number']) ) {
    
    
    $sqlNew = "INSERT INTO Members ( Member_Code, Member_Name, Member_Phone_Number) 
    VALUES ( '$Member_CodeN', '$Member_NameN', '$Member_Phone_NumberN');";




    if (mysqli_query($conn, $sqlNew)) {
        echo "added a member successfully";
    } else {
        echo "Error: " . $sqlNew . "<br>" . mysqli_error($conn);
    }
        echo 'no errors in the form';
        header('Location: http://localhost/DatabasesProject-2021/frontend/members.php');
        exit;
    
}}}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="members.css?v=<?php echo time(); ?>">
    <title>Add A New Member</title>
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

        <div class="Instructors_requests" id="Serve">
            <h1 style="text-align: center;">Add A New Member</h1>
            <hr><br>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label id="text_input">Member Name/Surname:</label>
                <input type="text" name="Member_Name" placeholder="Enter Member Name and Surname" class="select" value="<?php echo htmlspecialchars($Member_Name); ?>">

                <div style="color: red;">
                    <?php echo $errors['Member_Name']; ?>
                    <!-- display error message here !-->
                </div>
                <br>
                <label id="text_input">Member Code:</label>
                <input type="text" name="Member_Code" placeholder="Enter Member Code" class="select" value="<?php echo htmlspecialchars($Member_Code); ?>">

                <div style="color: red;">
                    <?php echo $errors['Member_Code']; ?>
                    <!-- display error message here !-->
                </div>
                <br>
                <label id="text_input">Member Phone Number:</label>
                <input type="text" name="Member_Phone_Number" placeholder="Enter Member Phone Number" class="select" value="<?php echo htmlspecialchars($Member_Phone_Number); ?>">

                <div style="color: red;">
                    <?php echo $errors['Member_Phone_Number']; ?>
                    <!-- display error message here !-->
                </div>
                <br><br>
            

                <button  id="buton" name="submit" type="submit">Add</button>

            </form>
        </div>
    </div>
</body>

</html>