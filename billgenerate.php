<?php
session_start();
include ('connect.php');
//if (!($_SESSION['login'] == 'lac')) {
//	echo '<script>location.href="../index.php"</script>';
//}


$courses = array();
// $course_names = array();
$sql = "SELECT * from external_examinerorder";
$result = mysqli_query($conn, $sql);
$courses = mysqli_fetch_all($result, MYSQLI_ASSOC);

$query = "SELECT *FROM `bill entry`";
$res = mysqli_query($conn, $query);
$rates = mysqli_fetch_all($res, MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="s.css">
	<style>
		#mytb tr,
		th,
		td {
			padding: 2px 5px;
		}
	</style>
	<title>Bill Generate</title>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</head>

<body>
	<?php
	if (!isset($_GET['delsr'])) {

		?>


		<!-- SIDEBAR -->
		<?php //include('sidebar.php'); ?>
		<!-- SIDEBAR -->
		<div class="sidebar">
			<div class="logo-details">
				<i class=''></i>
				<div class="logo_name">DASHBOARD</div>
				<i class='bx bx-menu' id="btn"></i>
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
						<i class=''><ion-icon name="cloud-upload-outline"></i>
						<span class="links_name">Bill Rate</span>
					</a>
					<span class="tooltip">Bill Rate</span>
				</li>
				<li>
					<a href="billgenerate.php">
						<i class=''><ion-icon name="document-outline"></i>
						<span class="links_name">Bill Generate</span>
					</a>
					<span class="tooltip">Bill Generate</span>
				</li>
				
			</ul>
		</div>
		<!-- NAVBAR -->
		<section id="content">
			<!-- NAVBAR -->
			<?php
			//require_once 'navbar.php';
			?>
			<!-- NAVBAR -->

			<!-- MAIN -->
			<main>
				<h1 class="title">Bill Generate</h1>
				<ul class="breadcrumbs">
					<li><a href="dashboard_admin.php">Home</a></li>

					<li class="divider">/</li>
					<li><a href="billingrate.php" class="active">Bill Generate</a></li>
				</ul>

				<div class="data">
					<div class="content-data">
						<form method="post" action="" class="form">
							<div class="heading">
								Bill Generate
							</div>

							<div class="form-control">
								<label for="">Subject Code</label>
								<select name="code" id="sub_code" onchange="setsubject()"
									<?= isset($_POST['dbbtn']) ? "required" : "" ?>>
									<option value="" selected disabled>Course Code</option>
									<?php
									for ($i = 0; $i < count($courses); $i++) {
										?>
										<option value="<?= $courses[$i]['course_code'] ?>"><?= $courses[$i]['course_code'] ?>
										</option>
									<?php } ?>
								</select>
							</div>
							<div class="form-control">
								<label for="">Subject Name</label>
								<input type="text" name="cname" id="sub_name" readonly>
							</div>

							<div class="form-control">
								<label for="">Internal Examiner Name</label>
								<input type="text" name="iname" id="iname" readonly>

							</div>
							<div class="form-control">
								<label for="">External Examiner Name</label>
								<input type="text" name="ename" id="ename" readonly>

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
								<label for="">Is Practical/oral/Project/Internship </label>
								<select name="purpose" required id='purpose'>
									<option class="typeOfExam" value="" selected disabled>Select </option>
									<option class="typeOfExam" value="practical">Practical</option>
									<option class="typeOfExam" value="oral">Oral</option>
									<option class="typeOfExam" value="project">Project</option>
									<option class="typeOfExam" value="internship">Internship</option>
									<select>
							</div>
							<div class="form-control">
								<label for="">Count of Students</label>
								<input type="number" name="count" id="studentcount" required>

							</div>

							<div class="form-control">
								<label for="">Rate</label>
								<input type="number" name="rate" id="rate" readonly>

							</div>
							<div class="form-control">
								<label for="">Total</label>
								<input type="number" name="ttl" id="total" readonly>

							</div>
							<input type="submit" name="dbbtn" value="submit" class="btnsubmit">
					</div>
					</form>
				</div>
				</div>


				<table id="mytb" width="100%">
					<form method='post' enctype="multipart/form-data">
						<form action="orderletter.php" method="post">
							<tr>
								<th>sr no.</th>
								<th>internal examiner</th>
								<th>external examiner</th>
								<th>Course Code </th>
								<th>Course Name </th>
								<th>No. of students</th>
								<th> total</th>
								<th>view</th>


							</tr>
							<?php
							$sql = "SELECT * FROM `bill generate`";
							$res = mysqli_query($conn, $sql);
							$i = 1;
							while ($row = mysqli_fetch_assoc($res)) {
								?>
								<tr>
									<td>
										<?php echo $i++; ?>
									</td>
									<td>
										<?php echo $row['internal_name']; ?>
									</td>
									<td>
										<?php echo $row['external_name']; ?>
									</td>
									<td><?php

									echo $row['subject_code'];

									?></td>
									<td>
										<?php echo $row['subject_name']; ?>
									</td>


									<td>
										<?php echo $row['student_count']; ?>
									</td>
									<td>
										<?php echo $row['total']; ?>
									</td>
									<td>
										<a href="printbill.php?id=<?= $row['sr'] ?>">View</a>
									</td>
									<td>
										<!--
										<a href="editrate.php?sr=<?php //echo $row['sr']; ?>" class="editbtn" ><i
										class='bx bx-edit'></i>Edit</a> -->
										<!-- <a href="billingrate.php?delsr=<?php //echo $row['sr']; ?>" class="savebtn" id="modlink" ><i class='bx bx-message-square-x'></i>Remove</a> -->

									</td>
								</tr>
								<?php
							}

							?>
				</table>
				<!-- <?php
				// $counter = 0;
				// $sql = "SELECT *FROM `billgenerate`";
				// $result = mysqli_query($conn, $sql);
				// while ($row = mysqli_fetch_assoc($result)) {
				//     $counter++;
				//     $_SESSION['counter'] = $counter;
				?>
									<tr>
										<td>
											<?//= $counter ?>
										</td>
										<td><input type="text" name="<?php //echo 'iname' . $counter ?>" value="<?//= $row['internal_name']; ?>" id="txtfield" readonly></td>

										<td>
											<?php //if ($row['external_name'] != '' or $row['external_name'] != null) { ?>
												<input type="text" name="<?php //echo 'ename' . $counter; ?>" id="txtfield" value="<?//= $row['external_name']; ?>" readonly>
											<?php //} else {
												//echo "NA";
												?>
												<input hidden type="text" name="<? php// echo 'ename' . $counter; ?>" id="txtfield" value="<?//= $row['external_name']; ?>" readonly>

											<?php
	} ?>
										</td>

										<td><input type="text" name="<?php //echo 'code' . $counter; ?>" value="<//?= $row['subject_code'] ?>" id="txtfield" readonly></td>

										<td><input type="text" name="<? php// echo 'cname' . $counter; ?>" value="<?//= $row['subject_name'] ?>" id="txtfield" readonly></td>
										<td><input type="text" name="<?php //echo 'ttl' . $counter; ?>" value="<?//= $row['total'] ?>" id="txtfield" readonly></td>
										<td>
											<button type="submit" name="<?php //echo 'view' . $counter; ?>" class="viewbtn" id="view">view <i class='bx bx-file-find'></i></button>
										</td>
									  


									   
							</form>
					</table> -->
			<?php
			if (isset($_POST['dbbtn'])) {
				//  $count = 0;
				// $desig = $_POST['designation'];
				$subcode = $_POST['code'];
				$subname = $_POST['cname'];
				$int = strtoupper($_POST['iname']);
				$ext = strtoupper($_POST['ename']);
				$clevel = $_POST['corslevel'];
				$examtype = $_POST['purpose'];
				$count = $_POST['count'];
				$rate = $_POST['rate'];
				$total = $_POST['ttl'];
				$sql = "INSERT INTO `bill generate` VALUES (Null,'$subcode','$subname','$int', '$ext', '$clevel','$examtype','$count','$rate','$total');";
				$res = mysqli_query($conn, $sql);
				if ($res) {
					echo '<script>swal("Done!", "Data has been inserted", "success").then((value) => {
						location.href="billgenerate.php";
					  });</script>';
				} else {
					echo '<script>swal("Error!", "Data Not Inserted", "error").then((value) => {
						location.href="billgenerate.php";
					  });</script>';
				}
			}


			?>

		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->
	<?php require_once 'footer.php';
	//  else{
	//$delsr = $_GET['delsr'];
	?>
	<style>
		body {
			background-color: #fff;
		}
	</style>
	<!-- <dialog id='modal' open>
	<h3>Remove Entry From Table?</h3>
	<p>Click yes to remove the entry from table</p>
		<form action="" method="POST" class="inline">
			<a href="billingrate.php" class="editbtn">No</a>
			<input type="text" name="sr" hidden  value="<?= $delsr; ?>" id="">
			<input type="submit" name="delete" value="Yes" class='savebtn'>
		</form>
</dialog> -->

	<?php

	?>

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<!-- <script src="script.js"></script> -->
	<script defer>
		// document.getElementById('printtb').addEventListener('click',function(){
		// 	window.open('ratetable.php')
		//})

	</script>
	<script src="script.js"></script>
	<script defer>
		//setting subject name on subject code

		let intexam = document.getElementById('internal-examiner')
		let extexam = document.getElementById('external-examiner')
		// let exam=document.getElementById('exam')
		//  intexam.style.display = 'none'
		//  extexam.style.display = 'none'

		function setsubject() {
			let courses = <?= json_encode($courses) ?>;
			let code = document.getElementById('sub_code');
			let iname = document.getElementById('iname');
			let exam = document.getElementById('exam');
			let ename = document.getElementById('ename');
			let subname = document.getElementById('sub_name');

			console.log(courses)
			courses.forEach(course => {
				if (code.value == course.course_code) {
					subname.value = course.course_name
					iname.value = course.internal_examiner
					ename.value = course.External_Name

				}
			});
		}
		let courseLevel = document.querySelector('#corslevel');
		let purpose = document.querySelector('#purpose');
		let typeOfExams = document.querySelectorAll('.typeOfExam')
		courseLevel.addEventListener('change', () => {
			let selectedLevel = courseLevel.selectedOptions[0].value
			if (selectedLevel == '1/2/3') {
				if (typeOfExams.length >= 3) {
					for (let i in typeOfExams) {
						if (i >= 3) {
							typeOfExams[i].style.display = 'none';
						}
					}
				}
			} else if (selectedLevel == '4/5') {
				for (let i in typeOfExams) {
					typeOfExams[i].style.display = 'block';
				}
			}
		})
		let rate = document.getElementById('rate')
		let studentCount = document.getElementById('studentcount')
		let total = document.getElementById('total')
		purpose.addEventListener('change', () => {
			let rates = <?= json_encode($rates); ?>;
			console.log(rates)
			let selectedExam = purpose.selectedOptions[0].value
			let selectedCourseLevel = courseLevel.selectedOptions[0].value
			console.log(selectedExam)
			rates.forEach(rt => {
				if ((selectedExam.toLowerCase() == "project" || selectedExam.toLowerCase() == "internship") && selectedCourseLevel == '4/5') {
					console.log(rt.Practical_Oral);
					console.log(selectedCourseLevel);
					if (rt.Project_Internship == 'yes' && rt.Practical_Oral == "no" && rt.Course_Level == selectedCourseLevel) {
						rate.value = rt.Rate;
						console.log('rate added')
					}
				} else if (selectedExam.toLowerCase() == "oral" || selectedExam.toLowerCase() == "practical" && selectedCourseLevel == '1/2/3') {
					console.log(selectedExam)
					console.log(selectedCourseLevel);
					if (rt.Practical_Oral == 'yes' && rt.Course_Level == selectedCourseLevel) {

						rate.value = rt.Rate;
					}
				}
				else if (selectedExam.toLowerCase() == "oral" || selectedExam.toLowerCase() == "practical" && selectedCourseLevel == '4/5') {
					if (rt.Practical_Oral == 'yes' && rt.Course_Level == selectedCourseLevel) {
						rate.value = rt.Rate;
					}
				}
			});

		})

		studentCount.addEventListener('input', () => {
			let count = studentCount.value * rate.value
			total.value = count
		})


	</script>

</body>

</html>