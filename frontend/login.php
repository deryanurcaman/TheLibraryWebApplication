<?php
include '../database/config.php';
$conn = OpenCon();

$username = $password = '';        // initialize with empty string
$errors = array('username' => '', 'password' => ''); // keys and their ampty values


session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    if (empty($_POST['username'])) { 
        $errors['username'] = 'An email is required';
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'A password is required';
    } else {
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    }


    $table_name = "employees";
    $page_uri = "DatabasesProject-2021/frontend/mainpage.php";


    if (!empty($_POST['password']) && !empty($_POST['username'])) {
        $sql = 'SELECT id FROM '.$table_name.' WHERE Email = "'.$username.'" and password = "'.$password.'"';

        $result = mysqli_query($conn, $sql);
    
                
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $_SESSION['Email'] = $username;
            header("location: http://localhost/" . $page_uri);
        } else {
            $errors['check'] = "Your Login Email or Password is invalid";
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
    <link rel="stylesheet" href="login.css?v=<?php echo time(); ?>">
    <title>The Library</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Domine&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Stalemate&display=swap');
    body {
        font-family: 'Domine', serif;
    }
    
    body button {
        font-family: 'Domine', serif;
    }
</style>

<body>
    <div class="headerbox">

        <p>The Library</p>

    </div>

    <br><br><br>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1 id="title">User Login</h1>


        <p id="text_input">
            <label for="">Email:</label>
            <br>
            <input type="text" name="username" placeholder="Enter your username" size="80" class="select" value="<?php echo htmlspecialchars($username); ?>">
        </p>
        <div style="color: red;">
            <?php echo $errors['username']; ?>
            <!-- display error message here !-->
        </div>
        <br>
        <p id="text_input">
            <label for="">Password:</label>
            <br>
            <input type="password" name="password" placeholder="Enter your password" size="80" class="select" value="<?php echo htmlspecialchars($password); ?>">
        </p>
        <div style="color: red;">
            <?php echo $errors['password'];?>
            <!-- display error message here !-->
        </div>
        <br>

        <p id="text_input">
            <button style="font-size: 20px; color: rgb(255, 255, 255);" value="Login"> Login
            </button>
        </p>
    </form>
</body>

</html>