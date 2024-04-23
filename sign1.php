<?php
//logic php
$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';  
  $username=$_POST['username'];
  $password=$_POST['password'];


$sql="select * from `registration` where  username='$username'  and password='$password'";
$conn=mysqli_connect("localhost","root","","signupforms");

$result=mysqli_query($conn,$sql);
if($result){
  $num=mysqli_num_rows($result);
  if($num>0){
   // $user=1;    present data
   // echo"User already exists!!";
  // echo"Login Successfully.";
  $login=1;
  session_start();
  $_SESSION['username']=$username;
  header('location:dashboard_admin.php');
  }
  else{
    //echo"Invalid data!";
    $invalid=1;
    
  }
  }
  }

?>


<!--
<!doctype html>
<html >
  <head>
    Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">

    <title>Login Page</title>
  </head>
  <body>
  
  <?php
   if($login){
     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success :</strong>You are successfully logged in.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
   }
   ?>
   <?php
    if($invalid){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error : </strong>Invalid credentials.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
echo '<script>swal("Error!", "Data Not Inserted", "error").then((value) => {
  location.href="csv.php";
  });</script>';
   }
   ?>
   
<?php /* <!--
   if($success){
     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success :</strong>You are successfully logged in.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
   }*/
   ?>
  
   
  
<!--
<h1 class=text-center> Login Page</h1>
    <div class="container mt-5">
    <form action="sign.php" method="post">
  <div class="form-group">
    <label class=text-center for="exampleInputEmail1" >NAME</label>
    <input type="text" class="form-control" placeholder="Enter your Username" name="username">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" >Password</label>
    <input type="password" class="form-control"  placeholder="Enter your Password" name="password">
  </div>
  <br>
  <button type="Login" class="btn btn-primary w-100">Login</button>
</form>
    </div>-->


  </body>
</html>