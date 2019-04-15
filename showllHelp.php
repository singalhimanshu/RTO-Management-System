<?php
    if (isset($_POST['submit']))
    {
        require_once('Connection.php');
        session_start();
        $llno = $_POST['llno'];
        $aadhar = $_POST['aadhar'];
        $obj = new Connection();
        $db = $obj->getNewConnection();
        $sql = "select llno, aadhar from ll where llno=$llno AND aadhar=$aadhar";
        $res = $db->query($sql);
        $row = $res->fetch_assoc();
        $db->close();
        if ($row['llno'] === $llno AND $row['aadhar'] === $aadhar)
        {
            $_SESSION['llno'] = $llno;
            $_SESSION['aadhar'] = $aadhar;
            header("Location: showll.php");
            die();
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Show LL Help</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php require_once('header.php'); ?>
    <form method="post">
        LL NO: <input type="text" name="llno"><br>
        Aadhar NO: <input type="text" name="aadhar"><br>
        <input type="submit" name="submit">
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