<?php

    session_start();
    require_once('Connection.php');
    $llno = $_SESSION['llno'];
    $aadhar = $_SESSION['aadhar'];
    $obj = new Connection();
    $db = $obj->getNewConnection();
    $sql = "select * from ll where llno=$llno AND aadhar=$aadhar";
    $res = $db->query($sql);
    $row = $res->fetch_assoc();
    $name = $row['name'];
    $fatherName = $row['fatherName'];
    $dob = $row['dob'];
    $bloodGroup = $row['bloodGroup'];
    $address = $row['address'];
    $aadhar = $row['aadhar'];
    $validity = $row['validity'];
    $issueDate = $row['issueDate'];
    $gender = $row['gender'];
    $mobileno = $row['mobileNumber'];
    $email = $row['email'];
    $rto = $row['rto'];
    print("DL NO: $llno <br> Name: $name <br> Father's Name: $fatherName <br>
        DOB: $dob <br> Blood Group: $bloodGroup <br> Address: $address <br>
        Aadhar Number: $aadhar <br> Issue Date: $issueDate <br> Validity: $validity <br>");
    if (isset($_POST['submit']))
    {
        $Date = date("Y-m-d");
        $examDate = date('Y-m-d', strtotime($Date . ' + 15 days'));
        $q = "insert into dl(name, fatherName, dob, bloodGroup, address, aadhar, gender, mobileNumber, email, rto, examDate) 
        values('$name', '$fatherName', '$dob', '$bloodGroup', '$address', $aadhar, '$gender', $mobileno, '$email', '$rto', '$examDate')";
        $r = $db->query($q);
        $db->query("update dl set status=0 where aadhar=$aadhar");
        $db->close();
        header("Location: dlstatus.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Confirm New DL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php require_once('header.php'); ?>
    <form method="post">
        <input type="submit" value="Confirm Details" name="submit">
    </form>
    <?php require_once('footer.php'); ?>
    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>
</html>