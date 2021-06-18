<?php
include '../../database/config.php';
$conn = OpenCon();

$username = '';
session_start();
$username = $_SESSION['Username'];
$sql = 'SELECT * FROM Employees WHERE Username = "' . $username . '"';
$query = mysqli_query($conn, $sql);
$result2 = mysqli_fetch_array($query);

$Employee_Name = $Employee_Code = $Employee_Phone_Number = $Sex = $Username = $Password = '';        // initialize with empty string
$errors = array('Employee_Name' => '', 'Employee_Code' => '', 'Employee_Phone_Number' => '', 'Sex' => '', 'Username' => '', 'Password' => ''); // keys and their ampty values
if (isset($_POST['submit'])) {
    if (empty($_POST['Employee_Name'])) {
        $errors['Employee_Name'] = 'Employee name is required';
    } else {
        $Employee_Name = $_POST['Employee_Name'];
    }
    if (empty($_POST['Employee_Code'])) {
        $errors['Employee_Code'] = 'Employee code is required';
    } else {
        $Employee_Code = $_POST['Employee_Code'];
    }
    if (empty($_POST['Employee_Phone_Number'])) {
        $errors['Employee_Phone_Number'] = 'Employee phone number is required';
    } else {
        $Employee_Phone_Number = $_POST['Employee_Phone_Number'];
    }
    if (empty($_POST['Sex'])) {
        $errors['Sex'] = 'Sex is required';
    } else {
        $SexN = $_POST['Sex'];
    }
    if (empty($_POST['Username'])) {
        $errors['Username'] = 'Username is required';
    } else {
        $Username = $_POST['Username'];
    }
    if (empty($_POST['Password'])) {
        $errors['Password'] = 'Password is required';
    } else {
        $Password = $_POST['Password'];
    }


    if (array_filter($errors)) {
        // echo 'errors in the form';
    } else {
        // echo 'no errors in the form';

        if (!empty($_POST['Employee_Name']) && !empty($_POST['Employee_Code']) && !empty($_POST['Employee_Phone_Number']) && !empty($_POST['Sex']) && !empty($_POST['Username']) && !empty($_POST['Password'])) {


            $sqlNew = "INSERT INTO Employees ( Employee_Code, Employee_Name, Employee_Phone_Number, Sex, Username, Password) 
    VALUES ( '$Employee_Code', '$Employee_Name', '$Employee_Phone_Number', '$Sex', '$Username', '$Password' );";




            if (mysqli_query($conn, $sqlNew)) {
                echo "added an employee successfully";
            } else {
                echo "Error: " . $sqlNew . "<br>" . mysqli_error($conn);
            }
            echo 'no errors in the form';
            header('Location: http://localhost/DatabasesProject-2021/frontend/employees/employees.php');
            exit;
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
    <link rel="stylesheet" href="employees.css?v=<?php echo time(); ?>">
    <title>Add A New Employee</title>
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
            <h1 style="text-align: center;">Add A New Employee</h1>
            <hr><br>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label id="text_input">Employee Name/Surname:</label>
                <input type="text" name="Employee_Name" placeholder="Enter Employee Name and Surname" class="select" value="<?php echo htmlspecialchars($Employee_Name); ?>">

                <div style="color: red;">
                    <?php echo $errors['Employee_Name']; ?>
                    <!-- display error message here !-->
                </div>
                <br>
                <label id="text_input">Employee Code:</label>
                <input type="text" name="Employee_Code" placeholder="Enter Employee Code" class="select" value="<?php echo htmlspecialchars($Employee_Code); ?>">

                <div style="color: red;">
                    <?php echo $errors['Employee_Code']; ?>
                    <!-- display error message here !-->
                </div>
                <br>
                <label id="text_input">Employee Phone Number:</label>
                <input type="text" name="Employee_Phone_Number" placeholder="Enter Employee Phone Number" class="select" value="<?php echo htmlspecialchars($Employee_Phone_Number); ?>">

                <div style="color: red;">
                    <?php echo $errors['Employee_Phone_Number']; ?>
                    <!-- display error message here !-->
                </div>
                <br>
                <label id="text_input">Sex:</label>
                <select name="Sex" class="select" value="<?php echo htmlspecialchars($Sex); ?>">

                    <option> Female</option>
                    <option> Male</option>



                </select>
                <div style="color: red;">
                    <?php echo $errors['Sex']; ?>
                    <!-- display error message here !-->
                </div>
                <br>
                <label id="text_input">Username:</label>
                <input type="text" name="Username" placeholder="Enter Username" class="select" value="<?php echo htmlspecialchars($Username); ?>">

                <div style="color: red;">
                    <?php echo $errors['Username']; ?>
                    <!-- display error message here !-->
                </div>
                <br>
                <label id="text_input">Password:</label>
                <input type="password" name="Password" placeholder="Enter Password" class="select" value="<?php echo htmlspecialchars($Password); ?>">

                <div style="color: red;">
                    <?php echo $errors['Password']; ?>
                    <!-- display error message here !-->
                </div>







                <br><br>

                <button id="buton" name="submit" type="submit">Add</button>

            </form>
        </div>
    </div>
</body>

</html>