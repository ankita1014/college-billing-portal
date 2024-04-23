<?php
session_start();
include('connect.php');
//if (!($_SESSION['login'] == 'lac')) {
//	echo '<script>location.href="../index.php"</script>';
//}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
		</script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="s.css">
	<style>
		#mytb tr,th,td{
			padding: 2px 5px;
		}
	</style>
	<title>BILLING RATE ENTRY</title>
</head>

<body>
	<?php
if(!isset($_GET['delsr'])){

?>


	<!-- SIDEBAR -->
	<?php //include('sidebar.php'); ?>
	<!-- SIDEBAR -->
	<div class="sidebar">
    <div class="logo-details">
      <i class=''></i>
        <div class="logo_name">DASHBOARD</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
     
      <li>
        <a href="dashboard_admin.php">
          <i class=''><ion-icon name="home-outline"></i>
          <span class="links_name">HOME</span>
        </a>
         <span class="tooltip">HOME</span>
      </li>
      <li>
       <a href="billingrate.php">
         <i class='' ><ion-icon name="cloud-upload-outline"></i>
         <span class="links_name">Bill Rate</span>
       </a>
       <span class="tooltip">Bill Rate</span>
     </li>
     <li>
       <a href="billgenerate.php">
         <i class='' ><ion-icon name="document-outline"></i>
         <span class="links_name">Bill Generate</span>
       </a>
       <span class="tooltip">Bill Generate</span>
     </li>
    
	</ul>
	</div>
	<
	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<?php
		//require_once 'navbar.php';
		?>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Billing Rate Entry</h1>
			<ul class="breadcrumbs">
				
				<li><a href="dashboard_admin.php">Home</a></li> 
				<li class="divider">/</li>
				<li><a href="billingrate.php" class="active">Billing Rate Entry</a></li>
			</ul>


			<div class="data">
				<div class="content-data">
					<form method="post" action="" class="form">
						<div class="heading">
							Billing Rate Entry
						</div>
						<!-- <div class="content">
							<div class="form-control">
								<label for="">Purpose</label>
								<select name="purpose" id="purpose" required>
									<option selected value='' disabled>Select level</option>
									<option value="paper checking">paper checking</option>
									<option value="moderator"> Moderator</option>
									<option value="Model answer">Model answer</option>
									<option value="Convience Allowance">Convience Allowance</option>

									<select>
							</div> -->
							<div class="form-control">
								<label for="">MPECS</label>
								<select name="mpecs" required id='mpecs'>
									<option value='' selected disabled>Select MPECS</option>
									<option value="20">20</option>
									<option value="23">23</option>
									<select>
							</div>
							<div class="form-control">
								<label for="">Course Level</label>
								<select name="corslevel" required id='corslevel'>
									<option value="">Select course level</option>
									<option value="1/2/3">1/2/3</option>
									<option value="4/5">4/5</option>
									<select>
							</div>
							<div class="form-control">
								<label for="">Is Project or Internship</label>
								<select name="purpose" required id='purpose'>
									<option value="" selected disabled>Select Project/Internship </option>
									<option value="no" >No</option>
									<option value="yes">Yes</option>
								
									<select>
							</div>

							<div class="form-control">
								<label for="">Practical/Oral</label>
								<select name="section" id='section' required>
									<option value='' selected disabled>Select Practical/oral</option>
									<option value="yes">Yes</option>
									<option value="no">No</option>
									<select>
							</div>
							
							<div class="form-control">
								<label for="">Rate</label>
								<input type="number" name="rate" id="" required>

							</div>
							<input type="submit" name="dbbtn" value="submit" class="btnsubmit">
						</div>
					</form>
				</div>
			</div>
			<?php
			if (isset($_POST['dbbtn'])) {
				$purpose = $_POST['purpose'];
				if ($purpose == 'yes') {
					$level = $_POST['mpecs'];

					$section = 'no';		
					$corslevel = $_POST['corslevel'];
		
					$rate = $_POST['rate'];
				}
				else {
					$level = $_POST['mpecs'];
					$section = $_POST['section'];
					$rate = $_POST['rate'];
					$corslevel = $_POST['corslevel'];
				}
				$sql = "INSERT INTO `bill entry` VALUES (NULL,'$level','$corslevel','$purpose', '$section', '$rate');";
				$res = mysqli_query($conn, $sql);
				if ($res) {
					echo '<script>swal("Done!", "Data has been inserted", "success").then((value) => {
						location.href="billingrate.php";
					  });</script>';
				} else {
					echo '<script>swal("Error!", "Data Not Inserted", "error").then((value) => {
						location.href="billingrate.php";
					  });</script>';
				}
			}

			?>

			<div class="data">
				<div class="content-data">
					<table width="100%" id='mytb'>
						<tr>
							<th>Sr</th>
							<th>Mpecs</th>
							<th>Course Level</th>
							<th>Project/Internship</th>
							<th>Practical/Oral</th>
							<th>Rate</th>
							

						</tr>
						<?php
						$sql = "SELECT * FROM `bill entry`";
						$res = mysqli_query($conn, $sql);
						$i = 1;
						while ($row = mysqli_fetch_assoc($res)) {
							?>
							<tr>
								<td>
									<?php echo $i++; ?>
								</td>
								<td>
									<?php echo $row['MPECS']; ?>
								</td>
								<td>
								<?php echo $row['Course_Level']; ?>
								</td>
								<td><?php 
								
									echo $row['Project_Internship'];
								
								?></td>
								<td>
								<?php echo $row['Practical_Oral']; ?>
								</td>
								<td>
									<?php echo $row['Rate']; ?>
								</td>
								<td>
								<!--
										<a href="editrate.php?sr=<?php //echo $row['sr']; ?>" class="editbtn" ><i
										class='bx bx-edit'></i>Edit</a> -->
										<a href="billingrate.php?delsr=<?php echo $row['sr']; ?>" class="savebtn" id="modlink" ><i class='bx bx-message-square-x'></i>Remove</a>
			
										</td>
							</tr>
							<?php
						}

						?>
					</table>
					<br>
					
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->
	<?php require_once 'footer.php';
    }else{
	$delsr = $_GET['delsr'];
	?>
	<style>
		body{
			background-color: #61677A;
		}
	</style>
<dialog id='modal' open>
	<h3>Remove Entry From Table?</h3>
	<p>Click yes to remove the entry from table</p>
	
		<form action="" method="POST" class="inline">
			<a href="billingrate.php" class="editbtn">No</a>
			<input type="text" name="sr" hidden  value="<?= $delsr; ?>" id="">
			<input type="submit" name="delete" value="Yes" class='savebtn'>
		</form>
</dialog>

	<?php
	if(isset($_POST['delete'])){
		$del = $_POST['sr'];
		$sql = "DELETE FROM `bill entry` WHERE `sr` = '$del'; ";
		mysqli_query($conn, $sql);
		if(mysqli_affected_rows($conn)>0){
			echo '<script>swal("Done!", "Entry Removed successfully", "success").then((value) => {
				location.href="billingrate.php";
			  });</script>';
			  exit;
		}
		else{
			echo '<script>swal("Error!", "Failed to remove entry", "error").then((value) => {
				location.href="billingrate.php";
			  });</script>';
		}
	}
}?>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<!-- <script src="script.js"></script> -->
	<script defer>
		
		let section = document.getElementById('section')
		let pur = document.getElementById('purpose');
		pur.addEventListener('change', () => {
			console.log("hello");
			if (pur.value === 'yes') {
				section.classList.add('notedit')
				
				section.disabled = true
				
			}
			else{
				section.classList.remove('notedit')
				
				section.disabled = false
				
			}
		})
		document.getElementById('printtb').addEventListener('click',function(){
			window.open('ratetable.php')
		
		})

	</script>
	<script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  //let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>

</body>

</html>