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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<link rel="stylesheet" href="style2.css">
	<title>GPKP  SCHEME UPLOAD</title>
</head>

<body>


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
			<h1 class="title">Scheme Upload</h1>
			<ul class="breadcrumbs">
				
				<li><a href="dashboard.php">Home</a></li>
				<li class="divider">/</li>
				<li><a href="schemeupload.php" class="active">Scheme Upload</a></li>
			</ul>

			<div class="data">
				<div class="content-data">
					<form method="post" class="form">
						<div class="heading">
            Scheme Upload
						</div>
            <div class="content">
                            <div class="form-controls">
  
                            <div class="select1">
      <select id="coursecode" name="program">
       <option value="">Please select Program...</option>
        <option value="CE">CE</option>
        <option value="ME">ME</option>
        <option value="EE">EE</option>
        <option value="IE">IE</option>
		    <option value="IT">IT</option>
        <option value="MT">MT</option>
        <option value="ET">ET</option>
        <option value="CE2">CE2</option>
	    	<option value="ME2">ME2</option>
        <option value="ET2">ET2</option>
      </select>
</div>
</div>
      <div class="form-controls">
      <input type="text" placeholder="Program Code" id="coursename" name="code" value="" readonly>
     
    </div>
<script>
$('#coursecode').change(function () {
    var myValue = $(this).val();
    var myText = $("#coursecode :selected").text();
    if (myText != '' && myText === "CE") {
        $("#coursename").val(" 1");
    }
    else if (myText != '' && myText === "ME") {
        $("#coursename").val("2");
    }
    else if (myText != '' && myText === "EE") {
        $("#coursename").val("3");
       
    }
    else if (myText != '' && myText === "IE") {
        $("#coursename").val("4");
        
    }
	else if (myText != '' && myText === "IT") {
        $("#coursename").val("6");
        
    }
	else if (myText != '' && myText === "MT") {
        $("#coursename").val("7");
        
    }
	else if (myText != '' && myText === "ET") {
        $("#coursename").val("8");
        
    }
	else if (myText != '' && myText === "CE2") {
        $("#coursename").val("10");
        
    }
	else if (myText != '' && myText === "ME2") {
        $("#coursename").val("11");
        
    }
	else if (myText != '' && myText === "ET2") {
        $("#coursename").val("12");
        
    }
});

</script>

         <div class="form-controls">
                            <input type="text" placeholder=" Enter Scheme Name  (MPECS)" name="scheme" required />
                            </div>
                            
                            <div class="form-control">
                            <select name="Semester" id="sem" title="select Semester" required>
                                    <option value="" disabled selected hidden>Select Semester</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
            
                              </select>
                            </div>
                            <div class="form-control">
                            <input type="text" placeholder=" Enter Course Code"  name="ccode" required />
                            </div>
                            <div class="form-control">
                            <input type="text" placeholder=" Enter Course Name"  name="cname" required /></div>
                            <div class="form-control">
                            <select  id="sem"   title="select schedule"  name="pr" required>
                                    <option value="" disabled selected hidden> Select Practical or Oral</option>
                                    <option value="PR">Practical</option>
                                    <option value="Or">Oral</option>
                                    </select>
                            </div>
                            <div class="form-control">
                            <select  id="sem"   title="select Exam mode"  name="in" required>
                                <option value="" disabled selected hidden> Select Internal or External</option>
                                <option value="Internal">Internal</option>
                                <option value="External">External</option>
                                </select>
                            </div>
                            
                          
						

							<input type="submit" name="sub" value="submit" class="btnsubmit">
						</div>
					</form>
                    <div class="dividercu">OR</div>
                    <form action="" enctype="multipart/form-data" class="form" method="post">
						<div class="heading">
            Scheme Upload 
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
				</div>
			</div>

		</main>
    <?php

if(isset($_POST['sub'])){
$name = strtoupper($_POST['program']);
$code = strtoupper($_POST['code']);
$scheme = $_POST['scheme'];
$semester = strtoupper($_POST['Semester']);
$ccode = strtoupper($_POST['ccode']);
$cname = $_POST['cname'];
$pr = strtoupper($_POST['pr']);
$in = strtoupper($_POST['in']);

$sql = "INSERT INTO `scheme` VALUES(NULL,'$name','$code','$scheme', '$semester', '$ccode','$cname', '$pr','$in');";
$res = mysqli_query($conn, $sql);
if($res){
  echo '<script>swal("Done!", "Data has been inserted", "success").then((value) => {
    location.href="schemeupload.php";
    });</script>';
}
else{
  echo '<script>swal("Error!", "Data Not Inserted", "error").then((value) => {
    location.href="schemeupload.php";
    });</script>';
}
}

if(isset($_POST['dbbtn1'])){
  $file =  $_FILES['csvfile']['tmp_name'];
      $handle = fopen($file,"r");
        $i = 0;
        $table = "scheme";
        $res = 0;
      
      while(($cont = fgetcsv($handle,1000,",")) !== false)
      {
        // echo($cont[0]);
            $query = "INSERT INTO `scheme` VALUES (NULL, '$cont[1]', '$cont[2]', '$cont[3]', '$cont[4]',' $cont[5]','$cont[6]','$cont[7]','$cont[8]')";
        $res = mysqli_query($conn, $query); 
      }

      if($conn){
        echo '<script>swal("Done!", "Data has been inserted", "success").then((value) => {
          location.href="schemeupload.php";
          });</script>';
        }
        else{
          echo '<script>swal("Error!", "Data Not Inserted", "error").then((value) => {
            location.href="schemeupload.php";
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