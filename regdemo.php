<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form | CodingLab </title>
    <link rel="stylesheet" href="d.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

   
<style>
  .hidden{
    display: none;
  }

  .show{
    display:block;
  }
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
  
  <div class="container">
    <div class="title">INCOMING Practical/Oral Examination ENTRY FORM</div>
    <div class="content">
      <form action="" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Is Final Year Exam </span>
            <select name="slct1" id="slct1" name="yes" onchange="populate(this.id,'slct2')">
				<option value=""> -- Is Final Year -- </option>
				<option value="yes">YES</option>
				<option value="no">NO</option>
			</select>
</div>
<div class="input-box">
            <span class="details">Semester </span>
            
			<select name="slct2"   id="slct2"></select>
		</div>
<!--
<div class="container">
		
		<div class="f-group">
			<label for="">Final Year</label>
			<select name="slct1" id="slct1" onchange="populate(this.id,'slct2')">
				<option value=""> -- Is Final Year -- </option>
				<option value="yes">YES</option>
				<option value="no">NO</option>
			</select>
		</div>
		
		<div class="f-group">
			<label for="">Semester</label>
			<select name="slct2" id="slct2"></select>
		</div>

	</div>-->

<script>
		
		function populate(s1,s2)
		{
			var s1 = document.getElementById(s1);
			var s2 = document.getElementById(s2);
			s2.innerHTML = "";
			if(s1.value == "yes")
			{
				var optionArray = ['5|5','6|6'];
			}
			else if(s1.value  == 'no')
			{
				var optionArray = ['1|1','2|2','3|3','4|4'];
			}

			for(var option in optionArray)
			{
				var pair = optionArray[option].split("|");
				var newoption = document.createElement("option");

				newoption.value = pair[0];
				newoption.innerHTML=pair[1];
				s2.options.add(newoption);
			}

		}

	</script>




<!--
<script>
    let sems = ["YES","NO"];
    let semy = ["5","6"];
    let semn =["1","2","3","4"];

    let yesno =document.getElementById("yesno");
    let sem =document.getElementById("sem");

    sems.forEach(function addSems(item){
      let option.text =document.createElement("option");
      option.text = item;
      option.value = item;
      yesno.appendChild(option);



    });
    yesno.onchange = function(){
      sems.innerHTML = "<option></option>";
      if(this.value == "YES"){
        addToSem(semy);
      }
      if(this.value=="NO"){
        addToSem(semn);
      }
    }

    function addToSem(arr){
      arr.forEach(function(item){
        let option = docment.createElement("option");
        option.text = item;
        option.value = item;
        sem.appendChild(option);
      });
    }


  </script>
  -->
<div class="input-box">
            <span class="details">Subject Name</span>
            <input type="text"   name="sub">
          </div>
 
 <div class="input-box">
            <span class="details">Subject code</span>
            <input type="text"  name="code">
          </div>
 
    <div class="input-box">
            <span class="details">Exam  </span>
            <select name="pror" id="pror" class="pror">
            <option value="" >--Select--</option>
<option value="PR" >Practical</option>
<option value="PR">Oral</option>
<!--<option value="EOR">External-Oral</option>
<option value="IOR">Internal-Oral</option>-->
</select>
</div>
<div class="input-box">
            <span class="details">Exam Type </span>
            <select name="exam" id="exam" class="exam">
            <option value="" >--Select--</option>
<option value="EPR" >External</option>
<option value="IPR">Internal</option>

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
 <div class="hidden" id="pd">
            <span class="details">Name of External Examiner</span>
            <input type="text" name="examiner" >
       
 
  
            <span class="details">Inst. Code of External Examiner</span>
            <input type="text"   name="codeex" required>
          </div>
</div>
<script>
      $('.exam').change(function(){
        var responseID = $(this).val();
        if(responseID=="EPR"){
          $('#pd').removeClass("hidden");
          $('#pd').addClass("show");

        }
        else{
          $('#pd').removeClass("show");
          $('#pd').addClass("hidden");
        }
        console.log(responseID);
      });
     /* $('.exam').change(function(){
        var responseID = $(this).val();
        if(responseID=="EPR"){
          $('#pd').removeClass("hidden");
          $('#pd').addClass("show");

        }
        else{
          $('#pd').removeClass("show");
          $('#pd').addClass("hidden");
        }
        console.log(responseID);
      });*/

</script>
  
        </div>
       
        <div class="button">
          <input type="submit" value="Save" name="set">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
<?php 
include("connect.php");
?>
 
<?php

if(isset($_POST["set"]))
{
 $final=$_POST['slct1'];
 $semester=$_POST['slct2'];
 $subject=$_POST['sub'];
 $subode=$_POST['code'];
 $Exam=$_POST['pror'];
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

    
if($Exam!=""){
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
  else if($Exam==""){
    $sql="INSERT into examinfo values('$final','$semester','$subject','$subode','$Exam','$Candidate','$Internal','$Expert','$course','$code','$date','$duration','$LabAssi','$Peon')";
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
}
 ?>
 