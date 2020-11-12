<?php
require_once("Include/DB.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data from Database</title>
    <link rel="stylesheet" href="Include/style.css">
</head>
<body>
    <h2 class="success"> <?php echo @$_GET["id"]; ?></h2>
    <div class="searchButton">
        <fieldset>
            <form class="" action="View_From_Database.php" method="GET">
                <input type="text" name="Search" value="" placeholder="Search by name or ssn">
                <input type="submit" name="SearchButton" value="Search record">
            </form>
        </fieldset>
    </div>
    <?php
    if(isset($_GET["SearchButton"])) {
        global $ConnectingDB;
        $Search = $_GET["Search"];
        $sql = "SELECT * FROM emp_record WHERE ename=:searcH OR ssn=:searcH";
        $stmt=$ConnectingDB->prepare($sql);
        $stmt->bindValue(':searcH', $Search);
        $stmt-> execute();
        while ($Datarows = $stmt->fetch()) {
            $Id          = $Datarows["id"];
            $EName       = $Datarows["ename"];
            $SSN         = $Datarows["ssn"];
            $Department  = $Datarows["dept"];
            $Salary      = $Datarows["salary"];
            $HomeAddress = $Datarows["homeaddress"];
    ?>

    <table width="1000" border="5" align="center" style="margin-top: 50px; margin-bottom: 50px;">
        <caption>Search Result</caption>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>SSN</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Home Address</th>
            <th>Search again</th>
        </tr>
        <tr>
            <td><?php echo $Id; ?></td>
            <td><?php echo $EName; ?></td>
            <td><?php echo $SSN; ?></td>
            <td><?php echo $Department; ?></td>
            <td><?php echo $Salary; ?></td>
            <td><?php echo $HomeAddress; ?></td>
            <td> <a href="View_From_Database.php">Search Again</a></td>
        </tr>
    </table>

    <?php
        } // ending of while loop
    } // ending of Submit button
    ?>
        <table width="1000" border="5" align="center">
            <caption>View From Database</caption>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>SSN</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Home Address</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
                global $ConnectingDB;
                $sql = "SELECT * FROM emp_record";
                $stmt = $ConnectingDB->query($sql);
                while ($Datarows=$stmt->fetch()) {
                    $Id          = $Datarows["id"];
                    $EName       = $Datarows["ename"];
                    $SSN         = $Datarows["ssn"];
                    $Department  = $Datarows["dept"];
                    $Salary      = $Datarows["salary"];
                    $HomeAddress = $Datarows["homeaddress"];
            ?>
            <tr>
                <td><?php echo $Id ?></td>
                <td><?php echo $EName ?></td>
                <td><?php echo $SSN ?></td>
                <td><?php echo $Department ?></td>
                <td><?php echo $Salary ?></td>
                <td><?php echo $HomeAddress ?></td>
                <td> <a href="Update.php?id=<?php echo $Id; ?>">Update</a></td>
                <td> <a href="Delete.php?id=<?php echo $Id; ?>">Delete</a></td>
            </tr>
                <?php } ?>
        </table><br><br>
        <a href="Insert_DB.php" target="_blank" style="padding-left:300px;">Create New Data</a>
</body>
</html>
