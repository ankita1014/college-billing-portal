<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='signupforms';
$conn=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

if(!$conn){
   die(mysqli_error($conn));
}
else{
   //echo "Connection Successful";
}

//die(mysqli_error($conn));
//}

?>