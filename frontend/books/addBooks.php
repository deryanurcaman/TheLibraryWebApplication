<?php
include '../../database/config.php';
$conn = OpenCon();

$username = '';
session_start();
$username = $_SESSION['Username'];
$sql = 'SELECT * FROM Employees WHERE Username = "' . $username . '"';
$query = mysqli_query($conn, $sql);
$result2 = mysqli_fetch_array($query);


$Book_Code = $Book_Name = $Author = $Type = $Num_of_Edition  = $Quantity = $PublishingHouse_Name = '';        // initialize with empty string
$errors = array('Book_Code' => '', 'Book_Name' => '', 'Author' => '', 'Type' => '', 'Num_of_Edition' => '', 'Quantity' => '', 'PublishingHouse_Name' => ''); // keys and their ampty values
if (isset($_POST['submit'])) {
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
    // if (empty($_POST['Status'])) {
    //     $errors['Status'] = 'Status is required';
    // } else {
    //     $StatusN = $_POST['Status'];
    // }
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

        if (!empty($_POST['Book_Code']) && !empty($_POST['Book_Name']) && !empty($_POST['Author']) && !empty($_POST['Type']) && !empty($_POST['Num_of_Edition'])  && !empty($_POST['Quantity']) && !empty($_POST['PublishingHouse_Name'])) {


    $sqlNew = "INSERT INTO Books ( Book_Code, Book_Name, Author, Type, Num_of_Edition, Status, Quantity, PublishingHouse_Name) 
    VALUES ( '$Book_CodeN', '$Book_NameN', '$AuthorN', '$TypeN', '$Num_of_EditionN', 0, '$QuantityN', '$PublishingHouse_NameN');";




            if (mysqli_query($conn, $sqlNew)) {
                echo "added a book successfully";
            } else {
                echo "Error: " . $sqlNew . "<br>" . mysqli_error($conn);
            }
            
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
    <link rel="stylesheet" href="books.css">
    <title>Books</title>
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
            <h1 style="text-align: center;">Add A Book</h1>
            <hr><br>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

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

                        <button id="submit" name="submit" type="submit">Add</button>
            </form>
        </div>
    </div>
</body>

</html>