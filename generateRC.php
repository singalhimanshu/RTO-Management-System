<?php

    session_start();
    require_once('Connection.php');
    $vehicleNumber = $_SESSION['vehicleNumber'];
    $obj = new Connection();
    $db = $obj->getNewConnection();
    $sql = "select * from vehicle where vehicleNumber='$vehicleNumber'";
    $res = $db->query($sql);
    $row = $res->fetch_assoc();
    $name = $row['name'];
    $aadhar = $row['aadhar'];
    $chassisNo = $row['chassisNo'];
    $engineNo = $row['engineNo'];
    $vehicleClass = $row['vehicleClass'];
    $color = $row['color'];
    $fuelType = $row['fuelType'];
    $seatingType = $row['seatingType'];
    $rto = $row['rto'];
    print("Vehicle Number: $vehicleNumber<br>
        Name: $name <br>
        Aadhar Number: $aadhar <br>
        Chassis Number: $chassisNo <br>
        Engine Number: $engineNo <br>
        Vehicle Class: $vehicleClass <br>
        Color: $color <br>
        Fuel Type: $fuelType <br>
        Seating Type: $seatingType <br>
        RTO: $rto <br>
    ");
    session_destroy();
    $db->close();
?>