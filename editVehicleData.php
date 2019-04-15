
<?php
    session_start();
    require_once('Connection.php');
    $aadhar = $_SESSION['aadhar'];
    // echo $aadhar;
    // die();
    $obj = new Connection();
    $db = $obj->getNewConnection();
    $sql = "select * from vehicle where aadhar=$aadhar";
    $res = $db->query($sql);
    $row = $res->fetch_assoc();
?>

<html>
    <form method="post">
        name: <input type="text" name="name" value="<?php echo $row['name'] ?>"><br>
        chassisNo:<input type="text" name="chassisNo" value="<?php echo $row['chassisNo'] ?>"><br>
        engineNo:<input type="text" name="engineNo" value="<?php echo $row['engineNo'] ?>"><br>
        vehicleClass:<input type="text" name="vehicleClass" value="<?php echo $row['vehicleClass'] ?>"><br>
        color:<input type="text" name="color" value="<?php echo $row['color'] ?>"><br>
        fuelType:<input type="text" name="fuelType" value="<?php echo $row['fuelType'] ?>"><br>
        seatingType:<input type="text" name="seatingType" value="<?php echo $row['seatingType'] ?>"><br>
        rto:<input type="text" name="rto" value="<?php echo $row['rto'] ?>"><br>
        status:<input type="text" name="status" value="<?php echo $row['status'] ?>"><br>
        vehicleNumber:<input type="text" name="vehicleNumber" value="<?php echo $row['vehicleNumber'] ?>"><br>
        <input type="submit" value="Update" name="submit">
    </form>
</html>

<?php

if (isset($_POST['submit']))
{
    $name = $_POST['name'];$seatingType = $_POST['seatingType'];
    $vehicleNumber = $_POST['vehicleNumber'];$chassisNo = $_POST['chassisNo'];
    $engineNo = $_POST['engineNo'];$vehicleClass = $_POST['vehicleClass'];
    $color = $_POST['color'];$fuelType = $_POST['fuelType'];
    $status = $_POST['status'];$rto = $_POST['rto'];
    $q = "update vehicle 
    set name='$name', seatingType='$seatingType', vehicleNumber=$vehicleNumber, 
    chassisNo=$chassisNo, engineNo=$engineNo, vehicleClass='$vehicleClass', color='$color', 
    fuelType='$fuelType', status=$status, rto='$rto' where aadhar=$aadhar"; 
    $res1 = $db->query($q);
    if (!$res1)
        die($db->error);
    $db->close();
    session_destroy();
    header("Location: viewVehicleData.php");
    die();
    $db->close();
}

?>