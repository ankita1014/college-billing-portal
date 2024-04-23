<?php 
include('connect.php');
//session_start();
//if (!($_SESSION['login'] == 'lac')) {
 //   echo '<script>location.href="../index.php"</script>';
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
	<link rel="stylesheet" href="style2.css">
	<title>Staff Details</title>
</head>

<body>


<
<div class="sidebar">
    <div class="logo-details">
      <i class=''></i>
        <div class="logo_name">DASHBOARD</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="dashboard.php">
          <i class=''><ion-icon name="home-outline"></i>
          <span class="links_name">HOME</span>
        </a>
         <span class="tooltip">HOME</span>
      </li>
      <li>
       <a href="schemeupload.php">
         <i class='' ><ion-icon name="cloud-upload-outline"></i>
         <span class="links_name">Scheme Upload</span>
       </a>
       <span class="tooltip">Scheme Upload</span>
     </li>
     <!-- <li>
       <a href="regdemo.php">
         <i class='' ><ion-icon name="document-outline"></i>
         <span class="links_name">PR/OR Entry</span>
       </a>
       <span class="tooltip">PR/OR Entry</span>
     </li> -->
     <!-- <li>
       <a href="#">
         <i class='' ><ion-icon name="calculator-outline"></i>
         <span class="links_name">Billing</span>
       </a>
       <span class="tooltip">Billing</span>
     </li> -->
     <li>
       <a href="examorder.php">
         <i class='' ><ion-icon name="people-outline"></i>
         <span class="links_name">Examiner Order </span>
       </a>
       <span class="tooltip">Examiner Order</span>
     </li>
     <li>
       <a href="facultydetails.php">
         <i class='' ><ion-icon name="people-circle-outline"></i>
         <span class="links_name"> Add Faculty </span>
       </a>
       <span class="tooltip"> Add Faculty </span>
     </li>
     <li>
       <a href="facultylist.php">
         <i class='' ><ion-icon name="people-circle-outline"></i>
         <span class="links_name"> Faculty List</span>
       </a>
       <span class="tooltip"> Faculty list </span>
     </li>
     <li>
       <a href="editfaculty.php">
         <i class='' ><ion-icon name="people-circle-outline"></i>
         <span class="links_name"> Edit Faculty </span>
       </a>
       <span class="tooltip"> Edit Faculty </span>
     </li>
     <li>
       <a href="staffdetails.php">
         <i class='' ><ion-icon name="people-outline"></ion-icon></i>
         <span class="links_name">Staff Details</span>
       </a>
       <span class="tooltip">Staff Details</span>
     </li>
     <li>
       <a href="stafflist.php">
         <i class='' ><ion-icon name="people-outline"></ion-icon></i>
         <span class="links_name">Staff List</span>
       </a>
       <span class="tooltip">Staff List</span>
     </li>
     <li>
       <a href="editstaff.php">
         <i class='' ><ion-icon name="people-outline"></ion-icon></i>
         <span class="links_name">Edit Staff</span>
       </a>
       <span class="tooltip">Edit staff</span>
     </li>
     <!--<li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="profile.jpg" alt="profileImg">
           <div class="name_job">
             <div class="name">Prem Shahi</div>
             <div class="job">Web designer</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li>-->
    </ul>
  </div>
  
  
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  
  </section>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

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


 



	<!-- SIDEBAR -->
	<?php //include('sidebar.php'); ?>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Staff Details</h1>
			<ul class="breadcrumbs">
				<li><a href="dashboard.php">Home</a></li>
				<li class="divider">/</li>
				
				<li><a href="staffdetails.php" class="active">Add Staff </a></li>
			</ul>

			<div class="data">
				<div class="content-data">
					<form method="post" class="form">
						<div class="heading">
							Add Staff 
						</div>
						<div class="content">
							<div class="form-controls">
								<label>Staff Name</label>
								<input type="text" name="name" required id="">
								<span style="color:red;font-size:14px;">(e.g., Firstname Middlename Lastname)</span>
							</div>
							<br>
							<div class="form-controls">
								<label>Designation</label>
								<!-- <input type="text" name="designation" required id=""> -->
								<select name="designation" id=""  required>
                                    <option value="" disabled selected>Select Designation</option>
                                    <option value="Principal">Principal</option>
                                    <option value="Head of Department">Head of Department</option>
                                    <option value="Selection Grade Lect-I">Selection Grade Lect-I</option>
                                    <option value="Selection Grade Lect-II">Selection Grade Lect-II</option>
                                    <option value="Lecturer">Lecturer</option>
									<option value="Visiting Lecturer">Visiting Lecturer</option>
                                    <option value="Assistant Proffessor">Assistant Proffessor</option>
                                    <option value="Assosciate Proffessor">Assosciate Proffessor</option>
                                    <option value="Proffessor">Proffessor</option>
							</select>
							</div>
							<div class="form-controls">
							<label for="">Department</label>	
							<select name="department" id="" required>
								<option value="" disabled selected>Select Department</option>
								<option value="Automobile Engineering">Automobile Engineering</option>
								<option value="AI/ML Engineering">AI/ML Engineering</option>
								<option value="Applied Mechanics">Applied Mechanics</option>
								<option value="Civil Engineering">Civil Engineering </option>
								<option value="Chemistry">Chemistry</option>
								<option value="Computer Engineering">Computer Engineering</option>
								<option value="English">English</option>
								<option value="Electrical Engineering">Electrical Engineering</option>
								<option value="Electronics Engineering">Electronics Engineering</option>
								<option value="Electronics and Telecommunication">Electronics and Telecommunication</option>
								<option value="Electronics and Computer">Electronics and Computer</option>
								<option value="Information Technology">Information Technology</option>
								<option value="Maths">Maths</option>
								<option value="Mechanical Engineering">Mechanical Engineering</option>
								<option value="Metallurgy">Metallurgy</option>
								<option value="Physics">Physics</option>
								<option value="Sugar">Sugar</option>	
							</select>
							</div>
							
							<div class="form-control">
								<label>Institute Name</label>
								<input type="text" name="instname" required id="">
							</div>

							<div class="form-control">
								<label>Institute Code</label>
								<input type="text" name="institutec" required id="">
							</div>
							<div class="form-control">
								<label>Mobile no.</label>
								<input type="number" name="phonenum" required id="" maxlength="10">
							</div>
							<div class="form-control"><label for="">Email</label>
							<input type="email" name="staffmail" id="" required></div>
							<div class="form-control">
								<label>Bank Name</label>
								<input type="text" name="bankname" required id="">
							</div>
                            <div class="form-control">
								<label>Account Number</label>
								<input type="number" name="accno" required id="">
							</div>
							<div class="form-control">
								<label>IFSC Code</label>
								<input type="text" name="ifsccode" required id="">
							</div>
							<input type="submit" name="dbbtn" value="submit" class="btnsubmit">
						</div>
					</form>
                    <!-- <div class="dividercu">OR</div>
                    <form action="" enctype="multipart/form-data" class="form">
						<div class="heading">
							Staff Details (upload)
						</div>
						<div class="content">
							<div class="form-control">
								<label>Upload File</label>
								<input type="file" name="csvfile" id="image" hidden="hidden" required>
                                <div class="dummpy" id="custom"><i class='bx bx-upload'></i></div>
                                <br>
                                <nav class="custom-t" id="custom-text">No File Chosen, yet!</nav>
                                </div>
							<input type="submit" name="dbbtn1" value="submit" class="btnsubmit">
						</div>
					</form>
				</div> -->
			</div>

		</main>
		<?php

			if(isset($_POST['dbbtn'])){
			$name = strtoupper($_POST['name']);
			$desig = strtoupper($_POST['designation']);
			$phone = $_POST['phonenum'];
			$intname = strtoupper($_POST['instname']);
			$intcode = strtoupper($_POST['institutec']);
			$bank = strtoupper($_POST['bankname']);
			$acc = $_POST['accno'];
			$ifsc = strtoupper($_POST['ifsccode']);
			$department = strtoupper($_POST['department']);
			$staffmail = filter_input(INPUT_POST, 'staffmail', FILTER_VALIDATE_EMAIL);
			

			$query = "SELECT *FROM `staff_details` where staff_name = upper('$name') and phone = '$phone' or phone = '$phone'";
			 mysqli_query($conn, $query);
			if (mysqli_affected_rows($conn) > 0) {
				echo '<script>swal("Error!", "Data Already Exists", "error").then((value) => {
					location.href="staffdetails.php";
				  });</script>';
				exit;
			}
			//handle phone number exception

			$sql = "INSERT INTO `staff_details` VALUES('$name', '$staffmail','$desig','$department', '$intname','$intcode', '$phone','$bank', '$acc', '$ifsc');";
			$res = mysqli_query($conn, $sql);
			if($res){
				echo '<script>swal("Done!", "Data has been inserted", "success").then((value) => {
					location.href="staffdetails.php";
				  });</script>';
			}
			else{
				echo '<script>swal("Error!", "Data Not Inserted", "error").then((value) => {
					location.href="staffdetails.php";
				  });</script>';
			}
			}

			if(isset($_POST['dbbtn1'])){
				$file =  $_FILES['csvfile']['tmp_name'];
						$handle = fopen($file,"r");
							$i = 0;
							$table = "staff_details";
							$res = 0;
						while(($cont = fgetcsv($handle,1000,",")) !== false)
						{
							
									$query = "INSERT INTO `staff_details` VALUES ('', '${cont['0']}', '${cont['1']}', '${cont['2']}', '${cont['3']}', '${cont['4']}', '${cont['5']}')";
							$res = mysqli_query($conn, $query); 
						}

						if($conn){
							echo '<script>swal("Done!", "Data has been inserted", "success").then((value) => {
								location.href="staffdetails.php";
							  });</script>';
							}
							else{
								echo '<script>swal("Error!", "Data Not Inserted", "error").then((value) => {
									location.href="staffdetails.php";
								  });</script>';
							}
			}



			?>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->
	<?php require_once'footer.php';?>


	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="../script.js"></script>
    <script>
        const realfilebtn = document.getElementById('image');
        const dummy = document.getElementById('custom');
        const text = document.getElementById('custom-text');
        const text1 = document.querySelector('.custom-t');

        dummy.addEventListener("click", function(){
            realfilebtn.click();
        });

        realfilebtn.addEventListener("change", function(){
            if(realfilebtn.value){
                text.innerHTML = realfilebtn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
            }
            else{
                text.innerHTML = "No File Chosen, yet!"
            }
        });
    </script>
</body>

</html>