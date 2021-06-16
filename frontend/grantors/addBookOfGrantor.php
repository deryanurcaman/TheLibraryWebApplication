<?php
include '../../database/config.php';
$conn = OpenCon();

$username = '';
session_start();


$username = $_SESSION['Username'];
$sql = 'SELECT * FROM employees WHERE Username = "' . $username . '"';
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);
$emp = $result['Employee_Id'];

$sqlm = 'SELECT * FROM grantors ORDER BY Grantor_Name';
$querym = mysqli_query($conn, $sqlm);
$rowsm = array();
while ($resultm = mysqli_fetch_array($querym)) {
    $rowsm[] = $resultm;
}

$sqlb = 'SELECT * FROM books ORDER BY Book_Name';
$queryb = mysqli_query($conn, $sqlb);
$rowsb = array();
while ($resultb = mysqli_fetch_array($queryb)) {
    $rowsb[] = $resultb;
}

$Book_Code = $Book_Name = $Author = $Type = $Num_of_Edition  = $Quantity = $PublishingHouse_Name = '';        // initialize with empty string
$errors = array('m_name' => '', 'Book_Code' => '', 'Book_Name' => '', 'Author' => '', 'Type' => '', 'Num_of_Edition' => '', 'Quantity' => '', 'PublishingHouse_Name' => ''); // keys and their ampty values
if (isset($_POST['submit'])) {
    if (empty($_POST['m_name'])) {
        $errors['m_name'] = 'A grantor name is required';
    } else {
        $mname = mysqli_real_escape_string($conn, $_POST['m_name']);
    }
    if (empty($_POST['Book_Code'])) {
        $errors['Book_Code'] = 'Book Code is required';
    } else {
        $Book_CodeN = $_POST['Book_Code'];
    }
    if (empty($_POST['Book_Name'])) {
        $errors['Book_Name'] = 'Book Name is required';
    } else {
        $Book_NameN = $_POST['Book_Name'];
    }
    if (empty($_POST['Author'])) {
        $errors['Author'] = 'Author is required';
    } else {
        $AuthorN = $_POST['Author'];
    }
    if (empty($_POST['Type'])) {
        $errors['Type'] = 'Type is required';
    } else {
        $TypeN = $_POST['Type'];
    }
    if (empty($_POST['Num_of_Edition'])) {
        $errors['Num_of_Edition'] = 'Number of Edition is required';
    } else {
        $Num_of_EditionN = $_POST['Num_of_Edition'];
    }

    if (empty($_POST['Quantity'])) {
        $errors['Quantity'] = 'Quantity is required';
    } else {
        $QuantityN = $_POST['Quantity'];
    }
    if (empty($_POST['PublishingHouse_Name'])) {
        $errors['PublishingHouse_Name'] = 'Publishing House Name is required';
    } else {
        $PublishingHouse_NameN = $_POST['PublishingHouse_Name'];
    }


    if (array_filter($errors)) {
        // echo 'errors in the form';
    } else {
        // echo 'no errors in the form';

        if (!empty($_POST['m_name']) && !empty($_POST['Book_Code']) && !empty($_POST['Book_Name']) && !empty($_POST['Author']) && !empty($_POST['Type']) && !empty($_POST['Num_of_Edition'])  && !empty($_POST['Quantity']) && !empty($_POST['PublishingHouse_Name'])) {


            $employee_id=$_SESSION['Employee_Id'];

            $sql1 = 'SELECT * FROM grantors WHERE Grantor_Name = "' . $mname . '"';
            $query1 = mysqli_query($conn, $sql1);
            $result1 = mysqli_fetch_array($query1);

           


            $sqlNew2 = "INSERT INTO Books ( Book_Code, Book_Name, Author, Type, Num_of_Edition, Status, Quantity, PublishingHouse_Name) 
            VALUES ( '$Book_CodeN', '$Book_NameN', '$AuthorN', '$TypeN', '$Num_of_EditionN', 0, '$QuantityN', '$PublishingHouse_NameN');";


            mysqli_query($conn, $sqlNew2);

            $sql2 = 'SELECT * FROM books WHERE Book_Name = "' . $Book_NameN . '"';
            $query2 = mysqli_query($conn, $sql2);
            $result2 = mysqli_fetch_array($query2);

            $sqlNew1 = "INSERT INTO donated_books ( Book_Id, Grantor_Id) 
            VALUES ( '" . $result2['Book_Id'] . "', '" . $result1['Grantor_Id'] . "');";
        

            mysqli_query($conn, $sqlNew1);


       
            header('Location: http://localhost/DatabasesProject-2021/frontend/books/books.php');
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
    <link rel="stylesheet" href="grantors.css?v=<?php echo time(); ?>">
    <title>Add A Book Donated by A Grantor</title>
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

    <div class="main">

        <div class="Instructors_requests" id="Serve">
            <h1 style="text-align: center;">Add A Book Donated by A Grantor</h1>
            <hr><br>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <label>Grantor Information:</label><br>
                <hr>
                <label id="text_input">Grantor Name:</label>

                <select name="m_name" class="select" value="<?php echo htmlspecialchars($mname); ?>">
                    <?php
                    foreach ($rowsm as $rowm) {
                        echo '
                        <option> ' . $rowm['Grantor_Name'] . ' </option>
                        ';
                    }
                    ?>
                </select>
                <br>
                <div style="color: red;">
                    <?php echo $errors['m_name']; ?>
                    <!-- display error message here !-->
                </div>
                <br><br>
                <label> Book Information:</label><br>
                <hr>
                <label id="text_input"><label id="text_input">Book Code:</label>
                    <input type="text" name="Book_Code" placeholder="Enter Book Code" class="select" value="<?php echo htmlspecialchars($Book_Code); ?>">

                    <div style="color: red;">
                        <?php echo $errors['Book_Code']; ?>
                        <!-- display error message here !-->
                    </div>
                    <br>
                    <label id="text_input"><label id="text_input">Book Name:</label>
                        <input type="text" name="Book_Name" placeholder="Enter Book Name" class="select" value="<?php echo htmlspecialchars($Book_Name); ?>">

                        <div style="color: red;">
                            <?php echo $errors['Book_Name']; ?>
                            <!-- display error message here !-->
                        </div>
                        <br>
                        <label id="text_input">Author:</label>
                        <input type="text" name="Author" placeholder="Enter Author" class="select" value="<?php echo htmlspecialchars($Author); ?>">

                        <div style="color: red;">
                            <?php echo $errors['Author']; ?>
                            <!-- display error message here !-->
                        </div>
                        <br>
                        <label id="text_input">Type:</label>
                        <input type="text" name="Type" placeholder="Enter Type" class="select" value="<?php echo htmlspecialchars($Type); ?>">

                        <div style="color: red;">
                            <?php echo $errors['Type']; ?>
                            <!-- display error message here !-->
                        </div>
                        <br>
                        <label id="text_input">Number Of Edition:</label>
                        <input type="number" name="Num_of_Edition" placeholder="Enter Number Of Edition" class="select" value="<?php echo htmlspecialchars($Num_of_Edition); ?>">

                        <div style="color: red;">
                            <?php echo $errors['Num_of_Edition']; ?>
                            <!-- display error message here !-->
                        </div>
                        <br>
                        <label id="text_input">Quantity:</label>
                        <input type="number" name="Quantity" placeholder="Enter Quantity" class="select" value="<?php echo htmlspecialchars($Quantity); ?>">

                        <div style="color: red;">
                            <?php echo $errors['Quantity']; ?>
                            <!-- display error message here !-->
                        </div>
                        <br>
                        <label id="text_input">Publishing House Name:</label>
                        <input type="text" name="PublishingHouse_Name" placeholder="Enter Publishing House Name" class="select" value="<?php echo htmlspecialchars($PublishingHouse_Name); ?>">

                        <div style="color: red;">
                            <?php echo $errors['PublishingHouse_Name']; ?>
                            <!-- display error message here !-->
                        </div>
                        <br>
                        <br>
                        <br>
                        <button id="submit" name="submit" type="submit">Add</button>

            </form>
        </div>
    </div>
</body>

</html>