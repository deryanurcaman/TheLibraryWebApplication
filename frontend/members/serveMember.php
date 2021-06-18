<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="members.css?v=<?php echo time(); ?>">
    <title>Serve A Book To The Member</title>
</head>

<?php
include '../../database/config.php';
$conn = OpenCon();

$username = '';
session_start();


$username = $_SESSION['Username'];
$sql = 'SELECT * FROM employees WHERE Username = "' . $username . '"';
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);
$emp=$result['Employee_Id'];

$sqlm = 'SELECT * FROM members ORDER BY Member_Name';
$querym = mysqli_query($conn, $sqlm);
$rowsm = array();
while ($resultm = mysqli_fetch_array($querym)) {
    $rowsm[] = $resultm;
}

$sqlb = 'SELECT * FROM books WHERE Quantity>0 ORDER BY Book_Name';
$queryb = mysqli_query($conn, $sqlb);
$rowsb = array();
while ($resultb = mysqli_fetch_array($queryb)) {
    $rowsb[] = $resultb;
}


$mname = $bname = $bcode = $date = '';        // initialize with empty string
$errors = array('m_name' => '', 'b_name' => '', 'date' => '', 'check' => ''); // keys and their ampty values

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    if (empty($_POST['m_name'])) {
        $errors['m_name'] = 'A member name is required';
    } else {
        $mname = mysqli_real_escape_string($conn, $_POST['m_name']);
    }

    if (empty($_POST['b_name'])) {
        $errors['b_name'] = 'A book name is required';
    } else {
        $bname = mysqli_real_escape_string($conn, $_POST['b_name']);
    }

    if (empty($_POST['date'])) {
        $errors['date'] = 'A date is required';
    } else {
        $date = mysqli_real_escape_string($conn, $_POST['date']);
    }

    if (!empty($_POST['m_name']) && !empty($_POST['b_name']) && !empty($_POST['date'])) {


        $sql1 = 'SELECT * FROM members WHERE Member_Name = "' . $mname . '"';
        $query1 = mysqli_query($conn, $sql1);
        $result1 = mysqli_fetch_array($query1);
        $case_name = "serve";

        $sql2 = 'SELECT * FROM books WHERE Book_Name = "' . $bname . '"';
        $query2 = mysqli_query($conn, $sql2);
        $result2 = mysqli_fetch_array($query2);

        $sql4 = 'UPDATE books SET Quantity=Quantity-1 WHERE Book_Name = "' . $bname . '"';

        $sql3 = "INSERT INTO borrowed_books ( Book_Id, Member_Id, Borrow_Date, Serve_Employee ) 
        VALUES ( '" . $result2['Book_Id'] . "', '" . $result1['Member_Id'] . "', '$date', '$emp' );";


        if (mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4)) {
            echo '<script> alert("Book served to member successfully."); window.location="serveMember.php" </script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
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
            <h1 style="text-align: center;">Serve A Book To The Member</h1>
            <hr><br>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <label>Member Information:</label><br>
                <hr>
                <label id="text_input">Member Name/Surname:</label>

                <select name="m_name" class="select" value="<?php echo htmlspecialchars($mname); ?>">
                        <?php
                        foreach ($rowsm as $rowm) {
                            echo '
                        <option> ' . $rowm['Member_Name'] . ' </option>
                        ';
                        }
                        ?>
                    </select>
               <br>
                <div style="color: red;font-size:15px; font-weight:600;">
                    <?php echo $errors['m_name']; ?>
                </div>
                <br><br>
                <label>Borrowed Book Information:</label><br>
                <hr>
                <label id="text_input"><label id="text_input">Book Name:</label>
                <select name="b_name" class="select" value="<?php echo htmlspecialchars($mname); ?>">
                        <?php
                        foreach ($rowsb as $rowb) {
                            echo '
                        <option> ' . $rowb['Book_Name'] . ' </option>
                        ';
                        }
                        ?>
                    </select>
                    <br>
                    <div style="color: red;font-size:15px; font-weight:600;">
                        <?php echo $errors['b_name']; ?>
                    </div>
                    <br>
                    <label id="text_input">Date:</label>
                    <input type="date" name="date" id="select" value="<?php echo htmlspecialchars($date); ?>">
                    <div style="color: red;font-size:15px; font-weight:600;">
                        <?php echo $errors['date'];?>
                    </div>
                    <br>
                    <br>
                    <button id="buton" type="submit">Serve</button>

            </form>
        </div>
    </div>
</body>

</html>