<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DL Status</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php require_once('header.php'); ?>
    <?php
        session_start();
        require_once('Connection.php');
        $aadhar = $_SESSION['aadhar'];
        $rto = $_SESSION['rto'];
        $obj = new Connection();
        $db = $obj->getNewConnection();
        $sql = "select * from dl where aadhar=$aadhar";
        $res = $db->query($sql);
        $row = $res->fetch_assoc();
        $status = $row['status'];
        $id = $row['id'];
        $examDate = $row['examDate'];
        if ($status)
        {
            print("DL approved Generate your DL <a href='showdlHelp.php'>here</a>");
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
