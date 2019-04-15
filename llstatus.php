<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LL Status</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php require_once('header.php'); ?>
    <?php
        session_start();
        require_once('Connection.php');
        $rto = $_SESSION['rto'];
        $aadhar = $_SESSION['aadhar'];
        $obj = new Connection();
        $db = $obj->getNewConnection();
        $sql = "select * from ll where aadhar=$aadhar";
        $res = $db->query($sql);
        if (!$res)
            die($db->error);
        $row = $res->fetch_assoc();
        $status = $row['status'];
        $id = $row['id'];
        $examDate = $row['examDate'];
        $db->close();
        if ($status)
        {
            print("Status: Approved <br> <a href='showllHelp.php'>Show LL </a>");
            session_destroy();
            die();
        }
        print(" Status: Pending <br>
                Test Date: $examDate <br>
                RTO Office: $rto <br>
                Unique ID: $id <br>
            ");
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


