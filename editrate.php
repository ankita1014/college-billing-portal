<?php
session_start();
include('connect.php');
// if (!($_SESSION['login'] == 'lac')) {
// 	echo '<script>location.href="../index.php"</script>';
// }

if(isset($_GET['sr'])){
$sr = $_GET['sr'];
$sql = "SELECT * FROM `bill entry` WHERE `sr` ='$sr'";
$result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="s.css">
    <title>Edit rate</title>
</head>

// <!-- SIDEBAR -->

<?php include('sidebar.php'); ?>
<!-- SIDEBAR -->

<!-- NAVBAR -->
<section id="content">
    <!-- NAVBAR -->
    <?php
   // require_once 'navbar.php';
    ?>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <h1 class="title">Edit Bill Rate</h1>
        <ul class="breadcrumbs">
            <li><a href="../index.php">Home</a></li>
            <li class="divider">/</li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="divider">/</li>
            <li><a href="editrate.php" class="active">Edit Bill Rate</a></li>
        </ul>

        <div class="data">
            <div class="content-data">
                <form method="post" action="" class="form">
                    <div class="heading">
                        Billing Rate Entry
                    </div>
                    <div class="content">
                    <div class="form-control">
                        <input type="text" name="sr" value="<?= $row['sr'] ?>" hidden id="">
								<label for="">Purpose</label>
								<select name="purpose" id="purpose" required>
									<option <?php echo ($row['purpose'])=='paper checking'?'selected':''; ?> value="paper checking">paper checking</option>
									<option <?php echo ($row['purpose'])=='moderator'?'selected':''; ?> value="moderator"> Moderator</option>
									<option <?php echo ($row['purpose'])=='Model answer'?'selected':''; ?> value="Model answer">Model answer</option>
									<option <?php echo ($row['purpose'])=='Convience Allowance'?'selected':''; ?> value="Convience Allowance">Convience Allowance</option>

									<select>
							</div>
							<div class="form-control">
								<label for=""> Level</label>
								<select name="level" required id='level'>
									<option <?php echo ($row['level'] == '1')?'selected':'';  ?> value="1">34/36/40</option>
									<option <?php echo ($row['level'] == '2')?'selected':''; ?>  value="2">70/80</option>
									<select>
							</div>
							<div class="form-control">
								<label for="">Course Level</label>
								<select name="corslevel" required id='level'>
									<option <?php echo ($row['courselevel'] == '1')?'selected':'';  ?>  value="1/2/3">1/2/3</option>
									<option <?php echo ($row['courselevel'] == '2')?'selected':''; ?>  value="4/5">4/5</option>
									<select>
							</div>

							<div class="form-control">
								<label for="">Section</label>
								<select name="section" id='section' required>
								
									<option <?php echo ($row['section'] == '2')?'selected':'';  ?> value="2">Full</option>
									<option <?php echo ($row['section'] == '1')?'selected':''; ?>  value="1">section</option>
									<select>
							</div>
							<div class="form-control">
								<label for="">Rate</label>
								<input type="number" value="<?= $row['rate']; ?>" name="rate" id="" required>

							</div>
							<input type="submit" name="dbbtn" value="submit" class="btnsubmit">
						</div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php
    if (isset($_POST['dbbtn'])) {
        $purpose = $_POST['purpose'];
        $level = $_POST['level'];
        $section = $_POST['section'];
        $rate = $_POST['rate'];
        $corslevel = $_POST['corslevel'];
        $sr = $_POST['sr'];


        $sql = "UPDATE `bill entry` SET  purpose = '$purpose', level = '$level', courselevel = '$corslevel',section =  '$section', rate = '$rate' WHERE sr = '$sr';";
        $res = mysqli_query($con, $sql);
        if ($res) {
            echo '<script>swal("Done!", "Data updated successfully", "success").then((value) => {
        location.href="dashboard.php";
      });</script>';
        } else {
            echo '<script>swal("Error!", "Data not updated", "error").then((value) => {
        location.href="dashboard.php";
      });</script>';
        }
    }

    ?>
    
                    

<body>
    
</body>
</html>