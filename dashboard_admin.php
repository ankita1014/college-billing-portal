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
<div class="sidebar">
    <div class="logo-details">
      <i class=''></i>
        <div class="logo_name">DASHBOARD</div>
        <a href="logout.php">LOGOUT</a>
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
         <span class="links_name">Bill Rate Entry</span>
       </a>
       <span class="tooltip">Bill Rate Entry</span>
     </li>
     <li>
       <a href="billgenerate.php">
         <i class='' ><ion-icon name="document-outline"></i>
         <span class="links_name">Bill Generate</span>
       </a>
       <span class="tooltip">Bill Generate<</span>
     </li>
     
     <!-- <li>
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
     </li> -->
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
    <div class="content">
      <form action="">
        <div class="user-details">
          
			
		   
		
          <div class="input-box">
		  <a href="billingrate.php">
             <input style="background-color: orange" type="button" value="Bill Entry">
			 </a>
          </div>
<br>

<br>
          <div class="input-box">
		  <a href="billgenerate.php">
           <input style="background-color: orange" type="button" value="Bill Generate">
          </a>
          </div>
          <br>
          <br>
		   
          
       
      </form>
    </div>
  </div>
  
  

</body>
</html>