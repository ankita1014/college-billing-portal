<html>
    <head></head>
    <style>
   body{
    background:  #F1F0F6;}
  table{
    background:white ;
  }
    </style>
</html>
<?php 
  include("connect.php");
  error_reporting(0);
 $sql="SELECT * FROM examinfo";
 $result= mysqli_query($conn,$sql);

 $total=mysqli_num_rows($result);

 //echo $total;
 if($total != 0){
    ?>
<h2 align="center">DISPLAYING ALL RECORDS</h2>
      <center>  <table border='2' cellspacing="4" width="66%">
            <tr>
        <th width="2%">Final Year</th>
        <th width="2%">Semester</th>
        <th width="2%">Subject</th>
            <th width="2%">Subject Code</th>
            <th width="2%">Exam Type</th>
            <th width="2%">No Of Candidates</th>
            <th width="2%">Internal Expert</th>
            <th width="2%">Expert Assistent</th>
            <th width="2%">Course</th>
            <th width="2%">Code/Schema</th>
            <th width="5%">Date</th>
            <th width="2%">Duration</th>
            <th width="2%">Lab Assistent</th>
            <th width="2%">Peon</th>
            <th width="2%">External Examiner</th>
            <th width="2%">Inst. Code of External Examiner</th>
            </tr>
        

   <?php
    while($res= mysqli_fetch_assoc($result))
    {
       echo "  <tr>
                <td align='center'>".$res['Final Year']."</td>
                <td align='center'>".$res['Semester']."</td>
                <td align='center'>".$res['Subject']."</td>
                <td align='center'>".$res['Subject Code']."</td>
                <td align='center'>".$res['Exam Type']."</td>
                <td align='center'>".$res['No Of Candidates']."</td>
                <td align='center'>".$res['Internal Expert']."</td> 
                <td>".$res['Expert Assistent']."</td>
                <td>".$res['Course']."</td>
                <td>".$res['Code/Schema']."</td>
                <td>".$res['Date']."</td>
                <td>".$res['Duration']."</td>
                <td>".$res['Lab Assistent']."</td>
                <td>".$res['Peon']."</td>
                <td>".$res['External Examiner']."</td>
                <td>".$res['Inst. Code of External Examiner']."</td>

               </tr>
           ";

    }
 }
 else{
    echo"Table has not records";
 }
/*echo $res['Final Year']." ".$res['Semester']." ". $res['Subject']." ".$res['Subject Code']." ". $res['Exam Type']." ".
$res['No Of Candidates']." ". $res['Internal Expert']." ".$res['Expert Assistent']." ". $res['course']." ".
$res['Code/Schema']." ".$res['Date']." ". $res['Duration']." ".$res['Lab Assistent']." ".$res['Peon']." ". 
$res['External Examiner']." ".$res['Inst. Code of External Examiner']."<br>";*/
 ?>
 </table>
      </center>
    </html>
 