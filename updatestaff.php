<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>



    <?php
    include 'connect.php';
    session_start();
    $name = strtoupper($_POST['staffname']);
    $desig = strtoupper($_POST['designation']);
    $dept = strtoupper($_POST['department']);
    $inst = strtoupper($_POST['instname']);
    $instc=strtoupper($_POST['instcode']);
    $phone = strtoupper($_POST['phonenum']);
    $bank = strtoupper($_POST['bankname']);
    $mail = filter_input(INPUT_POST, 'staffmail', FILTER_VALIDATE_EMAIL);
    $accnum = $_POST['accno'];
    $ifsc = strtoupper($_POST['ifsccode']);
    $mobile = $_SESSION['mob'];
    $query = "UPDATE staff_details SET `staff_name`= '$name' ,`staffmail` = '$mail',`designation`='$desig', `department`='$dept',`inst_name`='$inst' ,`inst_code`='$instc' ,`phone`='$phone',`bankname` = '$bank', `account no` = '$accnum',`IFSC code` = '$ifsc' WHERE `phone` = '$mobile'";
 
    if (mysqli_query($conn, $query)) {

        echo '<script>
                            swal("Success!","Details Updated Successfully","success").then((value) => location.href="editstaff.php");
                            </script>';
        exit;
    } else {
        echo '<script>
                            swal("Error!","Updates Unsuccessful","error").then((value) => location.href="edistaff.php");
                            </script>';
        exit;
    }


    ?>