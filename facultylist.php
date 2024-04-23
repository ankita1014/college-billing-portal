<?php
/*session_start();
require_once 'connect.php';

if (!($_SESSION['login'] == 'lac')) {
    echo '<script>location.href="../index.php"</script>';
}
*/

/*
$prevdept = '';
$prevname = '';
$prevdesig = '';
$name = '';
$desig = '';
$dept = '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style2.css">
    <title>Faculty List</title>
    <style>
      
    </style>
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
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="#">
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
       <a href="regdemo.html">
         <i class='' ><ion-icon name="document-outline"></i>
         <span class="links_name">PR/OR Entry</span>
       </a>
       <span class="tooltip">PR/OR Entry</span>
     </li>
     <li>
       <a href="#">
         <i class='' ><ion-icon name="calculator-outline"></i>
         <span class="links_name">Billing</span>
       </a>
       <span class="tooltip">Billing</span>
     </li>
     <li>
       <a href="#">
         <i class='' ><ion-icon name="people-outline"></i>
         <span class="links_name">Examiner Order </span>
       </a>
       <span class="tooltip">Examiner Order</span>
     </li>
     <li>
       <a href="facultydetails.php">
         <i class='' ><ion-icon name="people-circle-outline"></i>
         <span class="links_name">Faculty Details</span>
       </a>
       <span class="tooltip">Faculty Details</span>
     </li>
     <li>
       <a href="staffdetails.php">
         <i class='' ><ion-icon name="people-outline"></ion-icon></i>
         <span class="links_name">Staff Details</span>
       </a>
       <span class="tooltip">Staff Details</span>
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

 /* closeBtn.addEventListener("click", ()=>{
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






    <section id="content">
        <!-- NAVBAR -->
        
        <!-- NAVBAR -->

        <main>
            <h1 class="title">Faculty List</h1>
            <ul class="breadcrumbs">
                <li><a href="../index.php">Home</a></li>
                <li class="divider">/</li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li class="divider">/</li>
                <li><a href="stafflist.php" class="active">Faculty List </a></li>
            </ul>
            <div class="data">
                <div class="content-data">
                <form action="" class="form" style="background: #fff;" name="searchform">
                <div class="heading">
                    Faculty List
                </div>
                    <!-- <div class="form-control">
                        <label for="">Contact no.</label>
                        <input type="number" maxlength="10"  name="searchmob" value=""  onkeydown="searchbyMob(event)" id="searchmob">
                    </div> -->
                    <div class="form-control">
                        <label for="">Department</label>
                        <select name="searchdept" id="searchdept">
                        <option value="" disabled selected>Select Department</option>
                        <option value="ALL">ALL</option>
								<option value="Automobile Engineering">Automobile Engineering</option>
								<option value="AI/ML Engineering">AI/ML Engineering</option>
								<option value="Applied Mechanics">Applied Mechanics</option>
                                <option value="Chemistry">Chemistry</option>
								<option value="Civil Engineering">Civil Engineering </option>
								<option value="Computer Engineering">Computer Engineering</option>
								<option value="Electrical Engineering">Electrical Engineering</option>
								<option value="Electronics Engineering">Electronics Engineering</option>
								<option value="Electronics and Telecommunication">Electronics and Telecommunication</option>
								<option value="Electronics and Computer">Electronics and Computer</option>
                                <option value="English">English</option>
								<option value="Information Technology">Information Technology</option>
                                <option value="Maths">Maths</option>
								<option value="Mechanical Engineering">Mechanical Engineering</option>
								<option value="Metallurgy">Metallurgy</option>
                                <option value="Physics">Physics</option>
								<option value="Sugar">Sugar</option>
                        </select>
                    </div>
                </form>
                </div>
            </div>
            <div class="data">
                <div class="content-data" style="overflow:scroll;">
                    <?php
                    ?>
                    <table id="mytb" width="100%">
                        <form action="" method='post' name='dataform'>
                            <tr id="tbcols">
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Institute</th>
                                <th>Phone</th>
                                <th>Account No</th>
                                <th>IFSC code</th>
                              
                            </tr>
                            <?php
                            $counter = 0;
                            $sql = "SELECT *from staff_details";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                $counter+=1;
                                // echo 'staffname' . $counter;
                                ?>
                                <tr id='tablerows'>
                                    <td>
                                        <span id='srnumber'>

                                            <?= $counter; ?>
                                        </span>
                                    </td>
                                    <td><?= $row['staff_name']; ?></td>
                                    <td><?= $row['designation'];?></td>
                                    <td>
                                   <input type="text" readonly class="staffdept" id="txtfield" style="border: none;outline:none;" value="<?php echo $row['department'];?>">
                               

                                        	

                                      
                                    </td>
                                    <td>
                                    <?= $row['inst_name'];?>
                                    </td>
                                    <td>
                                        <?=  $row['phone'] ?></td>
                                     <td>
                                        <?= $row['account no'];?></td>
                                     <td> <?= $row['IFSC code']?></td>
                              
                                </tr>
                                <?php
                             } ?>
                        </form>
                    </table>
                </div>
            </div>
        </main>
    </section>
    <?php require_once'footer.php';?>
<script src="../script.js"></script>
<script>
    let depts =document.querySelectorAll('.staffdept')
    let rows = document.querySelectorAll('#tablerows')
    let sr =document.querySelectorAll('#srnumber');

   console.log(depts)
        const dept = document.getElementById('searchdept');
        dept.addEventListener('change',()=>{
            let depars = dept.value.toLowerCase()
            console.log(depars)
            let coun = 0;
            for(let x = 0;x<depts.length;x++){
                
                if(depts[x].value.toLowerCase() === depars){
                    coun+=1;
                    sr[x].innerHTML = coun
                    // console.log(depts[x].innerHTML)
                    // console.log(depts[x].innerHTML)
                    rows[x].style.display = ''
                }
                else if(depars === 'all'){
                    rows[x].style.display = ''
                }
                else{
                    rows[x].style.display = 'none'
                }
            }
        })

       

            // location.assign('.'+instnames[i])
            
      


        
        
    
</script>


</body>

</html>







*/




session_start();
require_once 'connect.php';

//if (!($_SESSION['login'] == 'lac')) {
  // echo '<script>location.href="../index.php"</script>';
//}



$prevdept = '';
$prevname = '';
$prevdesig = '';
$name = '';
$desig = '';
$dept = '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
   <link rel="stylesheet" href="style2.css"> 
    <title>Faculty List</title>
    <style>
      
    </style>
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



    <section id="content">
        <!-- NAVBAR -->
       

        <main>
            <h1 class="title">Faculty List</h1>
            <ul class="breadcrumbs">
                <li><a href="dashboard.php">Home</a></li>
                <li class="divider">/</li>
                
                <li><a href="facultylist.php" class="active">Faculty List</a></li>
            </ul>
            <div class="data">
                <div class="content-data">
                <form action="" class="form" style="background: #fff;" name="searchform">
                <div class="heading">
                    Faculty List
                </div>
                     
                    <div class="form-control">
                        <label for="">Department</label>
                        <select name="searchdept" id="searchdept">
                        <option value="" disabled selected>Select Department</option>
                        <option value="ALL">ALL</option>
                                <option value="Automobile Engineering">Automobile Engineering</option>
                                <option value="AI/ML Engineering">AI/ML Engineering</option>
                                <option value="Applied Mechanics">Applied Mechanics</option>
                                <option value="Chemistry">Chemistry</option>
                                <option value="Civil Engineering">Civil Engineering </option>
                                <option value="Computer Engineering">Computer Engineering</option>
                                <option value="Electrical Engineering">Electrical Engineering</option>
                                <option value="Electronics Engineering">Electronics Engineering</option>
                                <option value="Electronics and Telecommunication">Electronics and Telecommunication</option>
                                <option value="Electronics and Computer">Electronics and Computer</option>
                                <option value="English">English</option>
                                <option value="Information Technology">Information Technology</option>
                                <option value="Maths">Maths</option>
                                <option value="Mechanical Engineering">Mechanical Engineering</option>
                                <option value="Metallurgy">Metallurgy</option>
                                <option value="Physics">Physics</option>
                                <option value="Sugar">Sugar</option>
                        </select>
                    </div>
                </form>
                </div>
            </div>
            <div class="data">
                <div class="content-data" style="overflow:scroll;">
                    <?php
                    ?>
                    <table id="mytb" width="100%">
                        <form action="" method='post' name='dataform'>
                            <tr id="tbcols">
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Institute</th>
                                <th>Phone</th>
                                <th>Account No</th>
                                <th>IFSC code</th>
                              
                            </tr>
                            <?php
                            $counter = 0;
                            $sql = "SELECT *from faculty_details";
                            $result = mysqli_query($conn,$sql);
                            while ($row = mysqli_fetch_array($result)) {
                                $counter+=1;
                                // echo 'staffname' . $counter;
                                ?>
                                <tr id='tablerows'>
                                    <td>
                                        <span id='srnumber'>

                                            <?= $counter; ?>
                                        </span>
                                    </td>
                                    <td><?= $row['faculty_name']; ?></td>
                                    <td><?= $row['designation'];?></td>
                                    <td>
                                   <input type="text" readonly class="staffdept" id="txtfield" style="border: none;outline:none;" value="<?php echo $row['department'];?>">
                               

                                            

                                      
                                    </td>
                                    <td>
                                    <?= $row['inst_name'];?>
                                    </td>
                                    <td>
                                        <?=  $row['phone'] ?></td>
                                     <td>
                                        <?= $row['account no'];?></td>
                                     <td> <?= $row['IFSC code']?></td>
                              
                                </tr>
                                <?php
                             } ?>
                        </form>
                    </table>
                </div>
            </div>
        </main>
    </section>
    <?php require_once'footer.php';?>
<script src="../script.js"></script>
<script>
    let depts =document.querySelectorAll('.staffdept')
    let rows = document.querySelectorAll('#tablerows')
    let sr =document.querySelectorAll('#srnumber');

   console.log(depts)
        const dept = document.getElementById('searchdept');
        dept.addEventListener('change',()=>{
            let depars = dept.value.toLowerCase()
            console.log(depars)
            let coun = 0;
            for(let x = 0;x<depts.length;x++){
                
                if(depts[x].value.toLowerCase() === depars){
                    coun+=1;
                    sr[x].innerHTML = coun
                    // console.log(depts[x].innerHTML)
                    // console.log(depts[x].innerHTML)
                    rows[x].style.display = ''
                }
                else if(depars === 'all'){
                    rows[x].style.display = ''
                }
                else{
                    rows[x].style.display = 'none'
                }
            }
        })

       

            // location.assign('.'+instnames[i])
            
      


        
        
    
</script>


</body>

</html>










