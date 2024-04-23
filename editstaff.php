<?php
include('connect.php');
session_start();
//if (!($_SESSION['login'] == 'lac')) {
  //  echo '<script>location.href="../index.php"</script>';
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
    <title>GPKP LAC</title>
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



    <!-- NAVBAR -->
    <section id="content">
        <!-- NAVBAR -->
       

        <!-- MAIN -->
        <main>
            <h1 class="title"> Edit Staff Details</h1>
            <ul class="breadcrumbs">
                <li><a href="dashboard.php">Home</a></li>
                <li class="divider">/</li>
                
                <li><a href="editstaff.php" class="active"> Edit Staff Details</a></li>
            </ul>
            <div class="data">
                <div class="content-data">
                    <form method="post" class="form">
                        <div class="heading">
                        Edit Staff Details 
                        </div>
                        <div class="content">
                            <div class="form-control">
                                <label>Staff Contact no.:</label>
                                <input type="number" name="mobno" required id="">
                            </div>
                            <div class="form-control">
                                <input type="submit"class='btnsubmit' name="dbbtn" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if (isset($_POST['dbbtn'])) {
                $mobno = $_POST['mobno'];
                $_SESSION['mob'] = $mobno;
                $sql = "SELECT *FROM staff_details WHERE phone ='$mobno'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <div class="data">
                        <div class="content-data">
                            <form class="form" method='post' action='updatestaff.php'>
                            <div class="form-control">
                                <label>Staff Name</label>
                                <input type="text" name="staffname" value="<?php if (isset($_POST['mobno'])) {
                                    echo $row['staff_name'];
                                } ?>" required id="">
                                <span style="color:red;font-size:14px;">(e.g., Firstname Middlename Lastname)</span>
                            </div>
                            <br>
                            <div class="form-control">
                                <label>Designation</label>
                                <!-- <input type="text" name="designation" required id=""> -->
                                <input type="text" value="<?php if (isset($_POST['mobno'])) {
                                    echo $row['designation'];
                                } ?>" name="designation" id="" required>
                            </div>
                            <div class="form-control">
                                <label for="">Department</label>
                                <select name="department" required>
								<option value="" disabled selected>Select Department</option>
								<option value="Automobile Engineering" <?php if (strtolower($row['department']) == "automobile engineering") {
                                    echo "selected";
                                } ?>>Automobile Engineering</option>
								<option value="AI/ML Engineering"
                                <?php if (strtolower($row['department']) == 'ai/ml engineering') {
                                    echo 'selected';
                                } ?>
                                >AI/ML Engineering</option>
								<option value="Applied Mechanics"  <?php if (strtolower($row['department']) == 'applied mechanics') {
                                    echo 'selected';
                                } ?>>Applied Mechanics</option>
                                <option value="Chemistry"
                                <?php if (strtolower($row['department']) == 'chemistry') {
                                    echo 'selected';
                                } ?>
                                >Chemistry </option>
								<option value="Civil Engineering"
                                <?php if (strtolower($row['department']) == 'civil engineering') {
                                    echo 'selected';
                                } ?>
                                >Civil Engineering </option>
								<option value="Computer Engineering"
                                <?php if (strtolower($row['department']) == 'computer engineering') {
                                    echo 'selected';
                                } ?>
                                >Computer Engineering</option>
								<option value="Electrical Engineering"
                                <?php if (strtolower($row['department']) == 'electrical engineering') {
                                    echo 'selected';
                                } ?>
                                >Electrical Engineering</option>
								<option value="Electronics Engineering"
                                <?php if (strtolower($row['department']) == 'electronics engineering') {
                                    echo 'selected';
                                } ?>
                                >Electronics Engineering</option>
								<option value="Electronics and Telecommunication"
                                <?php if (strtolower($row['department']) == 'electronics and telecommunication') {
                                    echo 'selected';
                                } ?>
                                >Electronics and Telecommunication</option>
								<option value="Electronics and Computer"
                                <?php if (strtolower($row['department']) == 'electronics and computer') {
                                    echo 'selected';
                                } ?>
                                >Electronics and Computer</option>
                                <option value="English"
                                <?php if (strtolower($row['department']) == 'english') {
                                    echo 'selected';
                                } ?>
                                >English </option>
								<option value="Information Technology"
                                <?php if (strtolower($row['department']) == 'information technology') {
                                    echo 'selected';
                                } ?>
                                >Information Technology</option>
                                <option value="Maths"
                                <?php if (strtolower($row['department']) == 'maths') {
                                    echo 'selected';
                                } ?>
                                >Maths </option>
								<option value="Mechanical Engineering"
                                <?php if (strtolower($row['department']) == 'mechanical engineering') {
                                    echo 'selected';
                                } ?>
                                >Mechanical Engineering</option>
								<option value="Metallurgy"
                                <?php if (strtolower($row['department']) == 'metallurgy') {
                                    echo 'selected';
                                } ?>
                                >Metallurgy</option>
								<option value="Sugar"
                                <?php if (strtolower($row['department']) == 'sugar') {
                                    echo 'selected';
                                } ?>
                                >Sugar</option>
								
							</select>

                            </div>

                            <div class="form-control">
                                <label>Institute Name</label>
                                <input type="text" name="instname" value="<?= $row['inst_name']; ?>" required id="">
                            </div>
                            <div class="form-control">
                                <label>Institute Code</label>
                                <input type="text" name="instcode" value="<?= $row['inst_code']; ?>" required id="">
                            </div>
                            <div class="form-control">
                                <label>Mobile no.</label>
                                <input type="number" name="phonenum" value="<?= $row['phone']; ?>" required id=""
                                    maxlength="10">
                            </div>
                            <div class="form-control"><label for="">Email</label>
                            <input type="email" name="staffmail" value="<?= $row['staffmail']?>" id="">
                        </div>
                            <div class="form-control">
                                <label>Bank Name</label>
                                <input type="text" name="bankname" value="<?= $row['bankname']; ?>" required  id="">
                            </div>
                            <div class="form-control">
                                <label>Account Number</label>
                                <input type="number" name="accno" value="<?= $row['account no']; ?>" required id="">
                            </div>
                            <div class="form-control">
                                <label>IFSC Code</label>
                                <input type="text" name="ifsccode" value="<?= $row['IFSC code']; ?>" required id="">
                            </div>
                            <div>

                                <input type="submit" name="substaff" value="submit" class="btnsubmit">
                            </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    // mysqli_free_result($result);
                }
                else{
                    echo '<script>swal("Error!","No Record Found","error").then((value) => location.href="editstaff.php");</script>';
                    exit;
                }
            }
                        
            
            ?>

        </main>
    </section>

    <script src='../script.js'></script>
</body>

</html>