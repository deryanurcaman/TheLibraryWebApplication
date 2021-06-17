<html>

<head>
    <title>Country</title>
</head>

<body>
    <form method="POST" action="">
        Select Your Country
        <select name="country" onchange="this.form.submit()">
            <option value="" disabled selected>--select--</option>
            <option value="india">India</option>
            <option value="us">Us</option>
            <option value="europe">Europe</option>
        </select>
    </form>
    <?php
    if (isset($_POST["country"])) {
        $country = $_POST["country"];
        echo "select country is => " . $country;
    }
    ?>
</body>

</html>



<?php
if (isset($_POST["m_name"])) {
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
}
?>