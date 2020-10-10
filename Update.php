<?php
require_once("Include/DB.php");
$SearchQueryParameter = $_GET["id"];
if(isset($_POST["Submit"])) {
        $EName = $_POST["EName"];
        $SSN = $_POST["SSN"];
        $Department = $_POST["Department"];
        $Salary = $_POST["Salary"];
        $HomeAddress = $_POST["HomeAddress"];

        global $ConnectingDB;
        $sql = "UPDATE emp_record SET ename='$EName', ssn='$SSN', dept='$Department', salary='$Salary', homeaddress='$HomeAddress' WHERE id='$SearchQueryParameter'";
        $Execute = $ConnectingDB -> query($sql);
        if($Execute) {
            echo '<script>window.open("View_From_Database.php?id=Record Updated Successfully","_self")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data into Database</title>
    <link rel="stylesheet" href="Include/style.css">
</head>
<body>
    <?php
        global $ConnectingDB;
        $sql = "SELECT * FROM emp_record WHERE id='$SearchQueryParameter'";
        $stmt=$ConnectingDB->query($sql);
        while ($Datarows = $stmt->fetch()) {
                    $Id          = $Datarows["id"];
                    $EName       = $Datarows["ename"];
                    $SSN         = $Datarows["ssn"];
                    $Department  = $Datarows["dept"];
                    $Salary      = $Datarows["salary"];
                    $HomeAddress = $Datarows["homeaddress"];
        }
    ?>
    <div class="">
        <form class="" action="Update.php?id=<?php echo $SearchQueryParameter; ?>" method="post">
            <fieldset>
                <span class="FieldInfo">Employee Name</span><br>
                <input type="text" name="EName" value="<?php echo $EName ?>"><br>
                <span class="FieldInfo">Social Security Number</span><br>
                <input type="text" name="SSN" value="<?php echo $SSN ?>"><br>
                <span class="FieldInfo">Department</span><br>
                <input type="text" name="Department" value="<?php echo $Department ?>"><br>
                <span class="FieldInfo">Salary</span><br>
                <input type="text" name="Salary" value="<?php echo $Salary ?>"><br>
                <span class="FieldInfo">Home Address</span><br>
                <textarea name="HomeAddress" cols="20" rows="8"><?php echo $HomeAddress ?></textarea><br>
                <input type="submit" name="Submit" value="Submit your record">
                
            </fieldset>
        </form>
    </div>
</body>
</html>