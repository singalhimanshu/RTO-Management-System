<?php
    if (isset($_POST['submit']))
    {
        require_once('Connection.php');
        session_start();
        $dlno = $_POST['dlno'];
        $aadhar = $_POST['aadhar'];
        $obj = new Connection();
        $db = $obj->getNewConnection();
        $sql = "select dlno, aadhar from dl where dlno=$dlno AND aadhar=$aadhar";
        $res = $db->query($sql);
        $row = $res->fetch_assoc();
        $db->close();
        if ($row['dlno'] === $dlno AND $row['aadhar'] === $aadhar)
        {
            $_SESSION['dlno'] = $dlno;
            $_SESSION['aadhar'] = $aadhar;
            header("Location: showdl.php");
            die();
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Show DL Help</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form method="post">
        DL NO: <input type="text" name="dlno"><br>
        Aadhar NO: <input type="text" name="aadhar"><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>