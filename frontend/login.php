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


    <form action="">
        <h1 id="title">User Login</h1>


        <p id="text_input">
            <label for="">Username:</label>
            <br>
            <input type="text" name="item_name" placeholder="Enter your username" size="80" class="select" required>
        </p>
        <br>
        <p id="text_input">
            <label for="">Password:</label>
            <br>
            <input type="password" name="item_name" placeholder="Enter your password" size="80" class="select" required>
        </p>

        <br>

        <p id="text_input">
            <button style="font-size: 20px; color: rgb(255, 255, 255);" onclick="check(form)" value="Login"> Login
            </button>
        </p>
    </form>
</body>

</html>