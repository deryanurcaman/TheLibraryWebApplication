<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="grantors.css">
    <title>Grantors</title>
</head>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
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
        <div><img src="../frontend/assets/logo.png" height="150px" style="opacity: 0.8;"></img>
        </div>

        <br>
        <strong style="text-align:center;"><b style="font-size: 70px;">Welcome</b> Luna Lovegood</strong>

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
                    <a href="http://localhost/DatabasesProject-2021/frontend/books.php"></a>
                </td>

                <td> <a id="icon2" href="http://localhost/DatabasesProject-2021/frontend/books.php">Books</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/DatabasesProject-2021/frontend/members.php"></a>
                </td>

                <td> <a id="icon3" href="http://localhost/DatabasesProject-2021/frontend/members.php">Members</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/DatabasesProject-2021/frontend/grantors.php"></a>
                </td>

                <td> <a id="icon3" href="http://localhost/DatabasesProject-2021/frontend/grantors.php">Grantors</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/DatabasesProject-2021/frontend/employees.php"></a>
                </td>

                <td> <a id="icon3" href="http://localhost/DatabasesProject-2021/frontend/employees.php">Employees</a>
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
        <button class="dropbtn">Select</button>
        <div class="dropdown-content">
            <a href="#">Grantors</a>
            <a href="#Join">Add A Grantor</a>
        </div>
    </div>
    <br>

    <div class="main">
        <div class="Instructors_requests">
            <h1>Grantors</h1><br>
            <table>
                <tr id="heads">
                    <th>Detailed Information</th>
                    <th id="hashtag">#</th>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>Phone Number</th>
                    <th>Delete</th>
                </tr>
                <tr>
                    <td><img src="../frontend/assets/information.png" alt="" height="50px" id="myBtn"></td>
                    <td id="hashtag">1</td>
                    <td> Minerva </td>
                    <td>McGonagall</td>
                    <td>12345678 </td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
                <tr>
                    <td><img src="../frontend/assets/information.png" alt="" height="50px" id="myBtn"></td>
                    <td id="hashtag">2</td>
                    <td> Filius </td>
                    <td>Flitwick</td>
                    <td>12345679</td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
                <tr>
                    <td><img src="../frontend/assets/information.png" alt="" height="50px" id="myBtn"></td>
                    <td id="hashtag">3</td>
                    <td> Severus </td>
                    <td>Snape</td>
                    <td>12345610 </td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
                <tr>
                    <td><img src="../frontend/assets/information.png" alt="" height="50px" id="myBtn"></td>
                    <td id="hashtag">4</td>
                    <td> Pomona </td>
                    <td>Sprout</td>
                    <td>12345611 </td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
                <tr>
                    <td><img src="../frontend/assets/information.png" alt="" height="50px" id="myBtn"></td>
                    <td id="hashtag">5</td>
                    <td> Madame </td>
                    <td>Hooch</td>
                    <td>12345612 </td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
                <tr>
                    <td><img src="../frontend/assets/information.png" alt="" height="50px" id="myBtn"></td>
                    <td id="hashtag">6</td>
                    <td> Horace </td>
                    <td>Slughorn</td>
                    <td>12345613 </td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
                <tr>
                    <td><img src="../frontend/assets/information.png" alt="" height="50px" id="myBtn"></td>
                    <td id="hashtag">7</td>
                    <td> Sybill </td>
                    <td>Trelawney</td>
                    <td>12345614 </td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
                <tr>
                    <td><img src="../frontend/assets/information.png" alt="" height="50px" id="myBtn"></td>
                    <td id="hashtag">8</td>
                    <td> Remus </td>
                    <td>Lupin</td>
                    <td>1234561115</td>
                    <td><button id="decision"><img src="../frontend/assets/reject.png" alt=""></button></td>
                </tr>
            </table>
        </div>
        <br><br>

        <div class="Instructors_requests" id="Join">
            <h1 style="text-align: center;">Add A Grantor</h1>
            <hr><br>

            <form action="">

                <label>Grantor Information:</label><br>
                <hr>
                <label id="text_input">Grantor Id:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input">Grantor Name:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input">Grantor Surname:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input">Grantor Phone Number:</label>
                <input type="text" name="" id="select"><br>
                <br><br>
                <label>Donated Book Information:</label><br>
                <hr>
                <label id="text_input">Book Id:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input"><label id="text_input">Book Name:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input">Author:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input">Type:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input">Number Of Edition:</label>
                <input type="text" name="" id="select"><br>
                <br>
                <label id="text_input">Quantity:</label>
                <input type="number" name="" id="select" min="1"><br>
                <br>
                <label id="text_input">Date</label>
                <input type="date" name="" id="select"><br>
                <br>

                <button id="submit" type="submit">Add</button>

            </form>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span> Some text in the Modal..
        </div>

    </div>

</body>

</html>