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


$sqlm = "SELECT DISTINCT `members`.`Member_Name`, `members`.`Member_Id`
FROM `borrowed_books` 
LEFT JOIN `members` ON `borrowed_books`.`Member_Id` = `members`.`Member_Id`
WHERE  `borrowed_books`.`Return_Date` IS NULL
ORDER BY `members`.`Member_Name`";

$querym = mysqli_query($conn, $sqlm);
$rowsm = array();
while ($resultm = mysqli_fetch_array($querym)) {
    $rowsm[] = $resultm;
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



        $sql2 = 'SELECT * FROM books WHERE Book_Name = "' . $bname . '"';
        $query2 = mysqli_query($conn, $sql2);
        $result2 = mysqli_fetch_array($query2);


        $sql4 = 'UPDATE books SET Quantity=Quantity+1 WHERE Book_Name = "' . $bname . '"';

        $sql3 = "UPDATE borrowed_books SET Return_Date = '$date' WHERE Book_Id = '" . $result2['Book_Id'] . "' ;";

        $sql5 = "UPDATE  borrowed_books SET Return_Employee = '$emp'  WHERE Book_Id = '" . $result2['Book_Id'] . "' ;";

        if (mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4)&& mysqli_query($conn, $sql5)) {
            echo '<script> alert("Book returned to member successfully.");  window.location="returnMember.php" </script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
    <link rel="stylesheet" href="members.css?v=<?php echo time(); ?>">
    <title>Return The Book From The Member</title>
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
            <h1 style="text-align: center;">Return A Book From The Member</h1>
            <hr><br>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name='postForm' id='form' method="post">

                <label>Member Information:</label><br>
                <hr>
                <label id="text_input">Member Name/Surname:</label>

                <select name="m_name" class="select" onchange="this.form.submit()" value="<?php echo htmlspecialchars($mname); ?>">
                    <?php
                    if (isset($_POST['m_name'])) {
                        echo '<option selected> ' . $_POST['m_name'] . ' </option>
                   ';
                    } else {
                        echo ' <option selected disabled> Choose here </option>';
                    }?>
                    <?php
                    foreach ($rowsm as $rowm) {
                        echo '
                        <option> ' . $rowm['Member_Name'] . ' </option>
                        ';
                    }?>
                </select>
                <br>
                <div style="color: #581845; font-size:15px; font-weight:600;">
                    <?php echo $errors['m_name']; ?>
                </div>

                <br><br>

                <label>Borrowed Book Information:</label><br>
                <hr>
                <label id="text_input"><label id="text_input">Book Name:</label>
                    <select name="b_name" class="select" value="<?php echo htmlspecialchars($mname); ?>">
                    <?php
                    if (isset($_POST['b_name'])) {
                        echo '<option selected> ' . $_POST['b_name'] . ' </option>
                   ';
                    } else {
                        echo ' <option selected disabled> Choose here </option>';
                    }?>
                        <?php
                        $mname = $_POST["m_name"];
                        $sqlb = "SELECT `books`.`Book_Name`
                            FROM `borrowed_books` 
                                LEFT JOIN `members` ON `borrowed_books`.`Member_Id` = `members`.`Member_Id` 
                                LEFT JOIN `books` ON `borrowed_books`.`Book_Id` = `books`.`Book_Id`
                                WHERE  `borrowed_books`.`Return_Date` IS NULL AND  `members`.`Member_Name` ='$mname'
                                ORDER BY `books`.`Book_Name`";
                        $queryb = mysqli_query($conn, $sqlb);
                        $rowsb = array();
                        while ($resultb = mysqli_fetch_array($queryb)) {
                            $rowsb[] = $resultb;
                        }
                        foreach ($rowsb as $rowb) {
                            echo '
                        <option> ' . $rowb['Book_Name'] . ' </option>
                        ';
                        }?>
                    </select>
                    <br>
                    <div style="color: #581845; font-size:15px;">
                        <?php echo $errors['b_name']; ?>
                    </div>
                    <br>
                    <label id="text_input">Date:</label>
                    <input type="date" name="date" id="select" value="<?php echo htmlspecialchars($date); ?>">
                    <div style="color: #581845; font-size:15px;">
                        <?php echo $errors['date']; ?>
                    </div>
                    <br>
                    <br>
                    <button id="buton" type="submit">Return</button>

            </form>
        </div>
    </div>
</body>

</html>