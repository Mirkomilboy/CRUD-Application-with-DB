<?php
require_once("Include/DB.php");
if(isset($_POST["Submit"])) {
    if(!empty($_POST["EName"]) && !empty($_POST["SSN"])) {
        $EName = $_POST["EName"];
        $SSN = $_POST["SSN"];
        $Department = $_POST["Department"];
        $Salary = $_POST["Salary"];
        $HomeAddress = $_POST["HomeAddress"];

        // there are two ways of preventing from SQL injection: sql layer( $Name=mysql_real_escape_string($Name)) using "mysql_real_escape_string" function
        // another way is PDO named parameter that we are going to use down below
        // in this line we put value to each of the column so we will use PDO named parameter so that our form will be sql injection free
        // "->" operator in PDO means that we are using some variable as an object.
        global $ConnectingDB;
        $sql = "INSERT INTO emp_record(ename,ssn,dept,salary,homeaddress) VALUES(:enamE,:ssN,:depT,:salarY,:homeaddresS)";
        $stmt = $ConnectingDB -> prepare($sql);
        $stmt -> bindValue(':enamE', $EName); 
        $stmt -> bindValue(':ssN', $SSN);
        $stmt -> bindValue(':depT', $Department);
        $stmt -> bindValue(':salarY', $Salary);
        $stmt -> bindValue(':homeaddresS', $HomeAddress);
        $Execute = $stmt->execute();
        if($Execute) {
            echo '<span class="success"> Record has been added successfully</span>';
        }
    } else {
        echo '<span class="FieldInfoHeading">Please, at least enter name and ssn </span>';
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data into Database</title>
    <link rel="stylesheet" href="Include/style.css">
</head>
<body>
    <?php ?>
    <div class="">
        <form class="" action="Insert_DB.php" method="post">
            <fieldset>
                <span class="FieldInfo">Employee Name</span><br>
                <input type="text" name="EName"><br>
                <span class="FieldInfo">Social Security Number</span><br>
                <input type="text" name="SSN"><br>
                <span class="FieldInfo">Department</span><br>
                <input type="text" name="Department"><br>
                <span class="FieldInfo">Salary</span><br>
                <input type="text" name="Salary"><br>
                <span class="FieldInfo">Home Address</span><br>
                <textarea name="HomeAddress" cols="20" rows="8"></textarea><br>
                <input type="submit" name="Submit" value="Submit your record">
                
            </fieldset>
        </form>
    </div>
</body>
</html>