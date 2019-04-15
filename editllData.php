
<?php
    session_start();
    require_once('Connection.php');
    $aadhar = $_SESSION['aadhar'];
    // echo $aadhar;
    // die();
    $obj = new Connection();
    $db = $obj->getNewConnection();
    $sql = "select * from ll where aadhar=$aadhar";
    $res = $db->query($sql);
    $row = $res->fetch_assoc();
?>

<html>
    <form method="post">
        name: <input type="text" name="name" value="<?php echo $row['name'] ?>"><br>
        llno:<input type="text" name="llno" value="<?php echo $row['llno'] ?>"><br>
        fatherName:<input type="text" name="fatherName" value="<?php echo $row['fatherName'] ?>"><br>
        dob:<input type="text" name="dob" value="<?php echo $row['dob'] ?>"><br>
        bloodGroup:<input type="text" name="bloodGroup" value="<?php echo $row['bloodGroup'] ?>"><br>
        address:<input type="text" name="address" value="<?php echo $row['address'] ?>"><br>
        gender:<input type="text" name="gender" value="<?php echo $row['gender'] ?>"><br>
        mobileNumber:<input type="text" name="mobileNumber" value="<?php echo $row['mobileNumber'] ?>"><br>
        email:<input type="text" name="email" value="<?php echo $row['email'] ?>"><br>
        rto:<input type="text" name="rto" value="<?php echo $row['rto'] ?>"><br>
        status:<input type="text" name="status" value="<?php echo $row['status'] ?>"><br>
        validity:<input type="text" name="validity" value="<?php echo $row['validity'] ?>"><br>
        issueDate:<input type="text" name="issueDate" value="<?php echo $row['issueDate'] ?>"><br>
        <input type="submit" value="Update" name="submit">
    </form>
</html>

<?php

if (isset($_POST['submit']))
{
    $name = $_POST['name'];$llno = $_POST['llno'];
    $fatherName = $_POST['fatherName'];$dob = $_POST['dob'];
    $bloodGroup = $_POST['bloodGroup'];$address = $_POST['address'];
    $gender = $_POST['gender'];$mobileNumber = $_POST['mobileNumber'];
    $email = $_POST['email'];$rto = $_POST['rto'];
    $status = $_POST['status'];$validity = $_POST['validity'];
    $issueDate = $_POST['issueDate'];
    $q = "update ll 
    set name='$name', llno=$llno, fatherName='$fatherName', 
    dob='$dob', bloodGroup='$bloodGroup', address='$address', gender='$gender', 
    mobileNumber=$mobileNumber, email='$email', rto='$rto', status=$status, validity='$validity', issueDate='$issueDate' where aadhar=$aadhar"; 
    $res1 = $db->query($q);
    if (!$res1)
        die($db->error);
    $db->close();
    session_destroy();
    header("Location: viewllData.php");
    die();
    $db->close();
}

?>