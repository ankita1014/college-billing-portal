<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
  
  
    <meta charset="UTF-8">
    <link rel="stylesheet" href="d.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
	 <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
   </head>
<body>
<span class="divider"></span>
          
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


  <div class="containers">
    <div class="title">DASHBOARD</div>
    <a href="logout.php">LOGOUT</a>
    <div class="content">
      <form action="">
        <div class="user-details">
          
			
		   
		
          <div class="input-box">
		  <a href="schemeupload.php">
             <input style="background-color: orange" type="button" value="Scheme Upload">
			 </a>
          </div>

          <!-- <div class="input-box">
		  <a href="regdemo.php">
           <input style="background-color: orange" type="button" value="PR/OR Entry">
          </a>
          </div> -->
          
		   <!-- <div class="input-box">
             <input style="background-color: orange" type="button" value="Billing">
          </div> -->
          <div class="input-box">
            <a href="examorder.php">
                 <input style="background-color:orange" type="button" value=" Examiner Order">
                </a>
                </div>

		   <div class="input-box">
		  <!--<a href="facultydetails.php">-->
           <input style="background-color: #00072D , color= white" type="button" value="Faculty Details">
          </a>
          </div>
          
		  
          <div class="input-box">
          <!---- <a href="staffdetails.php">-->
                 <input style="background-color: #00072D , color= white" type="button" value="Staff Details">
                </a>
                </div>
          
		   <div class="input-box">
		  <a href="editfaculty.php">
           <input style="background-color: orange" type="button" value="Edit Faculty ">
          </a>
          </div>

          <div class="input-box">
            <a href="editstaff.php">
                 <input style="background-color: orange" type="button" value="Edit Staff ">
                </a>
                </div>

		   <div class="input-box">
            <a href="facultydetails.php">
                 <input style="background-color: orange" type="button" value="Add Faculty ">
                </a>
                </div>
                
                <div class="input-box">
                  <a href="staffdetails.php">
                       <input style="background-color: orange" type="button" value="Add Staff ">
                      </a>
                      </div>

          <div class="input-box">
            <a href="facultylist.php">
                 <input style="background-color: orange" type="button" value="List of Faculty ">
                </a>
                </div>
                <div class="input-box">
                  <a href="stafflist.php">
                       <input style="background-color: orange" type="button" value="List of Staff ">
                      </a>
                      </div>
        
       
      </form>
    </div>
  </div>
  
  

</body>
</html>