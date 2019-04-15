<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Show DL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php require_once('header.php'); ?>
    <?php
        session_start();
        require_once('Connection.php');
        $dlno = $_SESSION['dlno'];
        $aadhar = $_SESSION['aadhar'];
        $obj = new Connection();
        $db = $obj->getNewConnection();
        $sql = "select * from dl where dlno=$dlno AND aadhar=$aadhar";
        $res = $db->query($sql);
        $row = $res->fetch_assoc();
        $dlno = $row['dlno'];
        $name = $row['name'];
        $fatherName = $row['fatherName'];
        $dob = $row['dob'];
        $bloodGroup = $row['bloodGroup'];
        $address = $row['address'];
        $aadhar = $row['aadhar'];
        $validity = $row['validity'];
        $issueDate = $row['issueDate'];
        print("DL NO: $dlno <br> Name: $name <br> Father's Name: $fatherName <br>
            DOB: $dob <br> Blood Group: $bloodGroup <br> Address: $address <br>
            Aadhar Number: $aadhar <br> Issue Date: $issueDate <br> Validity: $validity");
        $db->close();
        session_destroy();
    ?>
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


