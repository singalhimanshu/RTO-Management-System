<?php

    session_start();
    require_once('Connection.php');
    $tempNo = $_SESSION['tempNo'];
    $status = $_SESSION['status'];
    if ($status)
        $displayStatus = "Accepted";
    else
        $displayStatus = "Pending";
    print("
        <h1>Vehicle Registration Status</h1> <br>
        Status : $displayStatus <br>
    ");
    if ($status)
    {
        $obj = new Connection();
        $db = $obj->getNewConnection();
        $q = "select vehicleNumber from vehicle where tempNo='$tempNo'";
        $result = $db->query($q);
        $row = $result->fetch_array();
        $vehicleNo = $row[0];
        print("Permanent Vehicle Number: $vehicleNo</br>");
        $db -> close();
    }
    session_destroy();
?>