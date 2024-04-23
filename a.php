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


<div class="sidebar">
    <div class="logo-details">
      <i class=''></i>
        <div class="logo_name">DASHBOARD</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      
      <li>
        <a href="index.html">
          <i class=''><ion-icon name="home-outline"></i>
          <span class="links_name">HOME</span>
        </a>
         <span class="tooltip">HOME</span>
      </li>
      <li>
       <a href="csv.php">
         <i class='' ><ion-icon name="cloud-upload-outline"></i>
         <span class="links_name">Scheme Upload</span>
       </a>
       <span class="tooltip">Scheme Upload</span>
     </li>
     <li>
       <a href="regdemo.php">
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
       <a href="examorder.php">
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
        
        <li><a href="staffdetails.php" class="active">Staff Details</a></li>
      </ul>

      <div class="data">
        <div class="content-data">
          <form method="post" class="form">
            <div class="heading">
              Staff Details
            </div>
            <div class="content">
              <div class="form-controls">
              
                                <div class="form-group">
                                    <label for="CATEGORY-DROPDOWN"></label>
                                    <select class="form-control" id="category-dropdown" name="category-dropdown">
                                        <option value="">Is this Final year</option>
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM categories where parent_id = 0");
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row["category"]; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div> <div class="form-group">
                                    <label for="SUBCATEGORY"></label>
                                    <select class="form-control" id="sub-category-dropdown" name="sub-category-dropdown">
                                        <option value="">Select Semester</option>
                                    </select>
                                </div>
<div class="input-box">
            <span class="details">Subject Name</span>
            <input type="text" placeholder="Enter subject name"  name="sub">
          </div>
 
 <div class="input-box">
            <span class="details">Subject code</span>
            <input type="text"  name="code">
          </div>
 
    <div class="input-box">
            <span class="details">Exam Type </span>
            <select name="exam" id="sem">
<option value="EPR">External-PR</option>
<option value="IPR">Internal-PR</option>
<option value="EOR">External-Oral</option>
<option value="IOR">Internal-Oral</option>
</select>
</div>
<div class="input-box">
            <span class="details">No of Candidates </span>
            <input type="text" name="candidate" required>
          </div>
          <div class="input-box">
            <span class="details">Name of Internal Examiner</span>
            <input type="text"  name="int" required>
          </div>
          <div class="input-box">
            <span class="details">Name of Expert Assistant</span>
            <input type="text" name="expert" >
          </div>
          <div class="input-box">
            <span class="details">Course</span>
            <input type="text"  name="course" required>
          </div>
          <div class="input-box">
            <span class="details">Master code/Scheme</span>
            <input type="text"  name="schema" required>
          </div>
         
 
 <div class="input-box">
            <span class="details">Date of Examination</span>
            <input type="date" id="date" name="date">
          </div>
 
 <div class="input-box">
            <span class="details">Duration/Session of Exam</span>
            <select name="dur" id="sem">
<option value="mor">Morning</option>
<option value="ar">Afternoon</option>
</select>
</div>
 
 <div class="input-box">
            <span class="details">Name of Lab Asst/Instructor</span>
            <input type="text" name="lab">
          </div>
 
 <div class="input-box">
            <span class="details">Name of Peon</span>
            <input type="text" name="peon" >
          </div>
 
 <div class="input-box">
            <span class="details">Name of External Examiner</span>
            <input type="text" name="examiner" >
          </div>
 <div class="input-box">
            <span class="details">Inst Code of External Examiner</span>
            <input type="text"   name="codeex" required>
          </div>
 
 
        </div>
       
        <div class="button">
          <input type="submit"     value="Save" name="set">
        </div>
              
            </div>
            
          </form>
        </div>
      </div>

    </main>
    


      
    <!-- MAIN -->
  </section>
  <!-- NAVBAR -->
  <?php require_once'footer.php';?>


  
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"  crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#category-dropdown').on('change', function() {
                    var category_id = this.value;
                    $.ajax({
                        url: "get-subcat.php",
                        type: "POST",
                        data: {
                            category_id: category_id
                        },
                        cache: false,
                        success: function(result) {
                            $("#sub-category-dropdown").html(result);
                        }
                    });
                });
            });
        </script>
</body>

</html>
<?php 
include("connect.php");
?>

<?php

if(isset($_POST["set"]))
{
 $final=$_POST['category-dropdown'];
 $semester=$_POST['sub-category-dropdown'];
 $subject=$_POST['sub'];
 $subode=$_POST['code'];
 $Exam=$_POST['exam'];
 $Candidate=$_POST['candidate'];
 $Internal=$_POST['int'];
 $Expert=$_POST['expert'];
 $course=$_POST['course'];
 $code=$_POST['schema'];
 $date=$_POST['date'];
 $duration=$_POST['dur'];
 $LabAssi=$_POST['lab'];
 $Peon=$_POST['peon'];
 $exteral=$_POST['examiner'];
 $InstCode=$_POST['codeex'];

    if($final!="" && $semester!="" && $subject!="" && $subode!="" && $Exam!="" && $Candidate!="" && $Internal!="" && $Expert!="" && $course!="" && $code!="" && $date!="" && $duration!="" && $LabAssi!="" && $Peon!="" && $exteral!="" && $InstCode!=""){

    

     $sql="INSERT into examinfo values('$final','$semester','$subject','$subode','$Exam','$Candidate','$Internal','$Expert','$course','$code','$date','$duration','$LabAssi','$Peon','$exteral','$InstCode')";
     $result=mysqli_query($conn, $sql);

     if($result)
     {
        echo"<script>alert('Record inserted successfully!!')</script>";
        ?>

     <meta http-equiv="refresh" content="0; URL=display.php" />
        
     <?php
    }
     else{
        echo "Failed";
     }
    }
    else{
        echo "Please fill the form!!";
    }
}
 ?>
