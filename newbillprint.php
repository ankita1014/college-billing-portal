<?php
    session_start();
   // if (!($_SESSION['login'] == 'lac')) {
     //   echo '<script>location.href="../index.php"</script>';
    //}
    include('connect.php');
    $total = 0;
    $half = 0;
    $pay1 = 0;
    $pay2 = 0;
    $pay3 = 0;
    $convence = 0;
    $staffcount_section = 0;
    $staffcount_full = 0;


    $moderatorcount_section = 0;
    $moderatorcount_full = 0;

    $staffName = strtoupper($_GET['staffname']);

    if($_GET['status'] == "YES")
    {
        echo '<script>window.print();</script>';
    echo '<script>	window.addEventListener("keydown",(event)=>{
		if (event.ctrlKey && event.key === "p") {
    event.preventDefault(); // Prevent the default Ctrl+P behavior
  }
	})</script>';
        echo "<script>document.getElementById('save').style.display = 'none'</script>";
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
     <style>
        *{
            font-family: 'Times New Roman', Times, serif;
        }
        .links {
            width: 100%;
            height: 10px;
            margin: 40px 0px 40px 0px;
            margin-top: 20px
        }

        .backbtn {
            margin: 10px 0px 10px 10px;
            padding: 10px;
            cursor: pointer;
            background: lightgreen;
        }

        body
        {
            padding : 30px;
        }

        
        table{
			border-collapse: collapse;
		}


		tr,th,td{
			border : 1px solid black;
			text-align: center;
			font-size: 14px;
			padding: 3px;
		}
        th{
            font-size: 16px;
        }
        #title{
            font-size:25px;
            font-weight: bold;
        }
        #subtitle{
            font-size: small;
        }
        #caption{
            color: blue;
            font-size: 20px;
            font-weight: semibold;
        }
    </style>
</head>
<body>

    <?php
        $q = "SELECT * FROM `bill_history` WHERE `name` LIKE '$staffName'";
        $r = mysqli_query($con,$q);

        if(mysqli_num_rows($r) <= 0)
        {
            ?>
        </form>
             <?php
        }   
        ?>

   
</div>

    <!-- <br> <br> -->
        <?php
           $sql1 = "SELECT * FROM `staff_details` WHERE staff_name = '$staffName'";
           $res1 = mysqli_query($con, $sql1); 
           $staffData = mysqli_fetch_assoc($res1);
        ?>
        <?php
           $sql2 = "SELECT * FROM `tbllacmaster`;";
           $res2 = mysqli_query($con, $sql2); 
           $staffData1 = mysqli_fetch_assoc($res2);
        ?>
    <div>
    <center> <span> Form No. 9 </span> <span> L.A.C Work</span> </center>
        <center><span id="title"> Government Polytechnic Kolhapur </span></center>
        
        <center><span id="subtitle"> ( An Autonomous Institute of Govt. of Maharashtra)</span> </center>
        <br>
        <center> <span id="caption">Examiner's Fee Bill For Examination Held on <?php echo $staffData1['semester'].'   '.$staffData1['year']; ?></span> </center>
        <table width="100%" id="mytb">
                <tr>
                     <th>Name of Examiner</th>
                     <td colspan="3"><?php echo strtoupper($staffData['staff_name'].' , '.$staffData['designation'].'  ,  '. $staffData['department'].'  ,  '. $staffData['inst_name']);?> </td>
                     <th>Bill ID</th>
                     <td><?php
                         $sql = "SELECT id FROM `bill_history` WHERE name = '$staffName';";
                         $res = mysqli_query($con,$sql);
                         $billiddata = mysqli_fetch_array($res);
                         echo isset($billiddata['id'])?$billiddata['id']:'-';
                         ?>
                         </td>
                     </tr>
                    
                     
                    <tr>
                    <th>Bank Name</th>
                     <td><?php echo $staffData['bankname'];?>  </td>
                    <th>Acc No. </th>
                    <td><?=  $staffData['account no']?></td>
                    <th>IFSC</th>
                    <td>
                        <?= $staffData['IFSC code'];?>
                    </td>
                    </tr>
                    <tr>
                     <th>Appoinment Order  No. </th>
                     <td colspan="5">  <?php 
                     $name = $staffData['staff_name'];
                     $designation = $staffData['designation'];
                     $fir = "SELECT `order` FROM `tbllacmaster` WHERE `srno` = '1';";
                     $frsv = mysqli_query($con, $fir);
                     $lacord = mysqli_fetch_array($frsv);
                     $query ="SELECT `id` FROM `examinerorder` WHERE staffname ='$name' AND  designation = '$designation' ";
                     $rsv = mysqli_query($con,$query);
                     $orderid = mysqli_fetch_array($rsv);
                     echo (isset($lacord['order']) and isset($orderid['id']))?$lacord['order']."/".$orderid['id']:'-'; ?> </td>
                     </tr>
                    
        </table>
      

        <div>
            <h5>INSTRUCTIONS :-</h5>
            <ol style="list-style:disc;">
                <li> This bill form should be used only for the examination work related with examinations conducted at Govt. Polytechnic, Kolhapur under autonomous status.</li>
                <li> Affix revenue stamp if necessary.</li>
                <li> Amount should NOT be carried over and brought forward from page to page. </li>
                <li> Examiners who are Gazetted Officers must given their full designation in column provided a required by Audit. </li>
                <li> Remuneration due to Paper setter and examiner is as per rates prescribed in Governing body meeting at Govt. Polytechnic, Kolhapur  held on   27 -06  - 2007  which are similar to B.T.E. norms. </li>
            </ol> 
    </div>
    </div>
    
   
 <center><span id="caption">As Assesment Details</span> </center>
 <br>
<table width="100%" id="mytb"  style="padding: 50px 100px; border: 1px solid black;">
                <tr>
                     <th>Sr No</th>
                    <th>Subject Code</th>
                    <th>Section</th>
                    <th>Paper Marks</th>
                    <th>Course Level</th>
                    <th>Paper Count</th>
                    <th>Total Amount</th>
                </tr>
                <?php 
                 $sr = 0;
                

                $sql = "SELECT * FROM `bill generate` WHERE `internal_name` = '$staffName' ORDER BY `program` ASC";
                $res = mysqli_query($con, $sql);
                if(mysqli_num_rows($res) <= 0)
                {
                    ?>
                    <tr>
                    <td>NA</td>
                    <td>NA</td>
                    <td>NA</td>
                    <td>NA</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>                   
                    </tr>
                <?php
                }

                while($row = mysqli_fetch_assoc($res)){
                    $sr = $sr + 1; 
                    $value = 0;
                    $result = "";

                    
                    if($row['submitdate'] == "0000-00-00")
                    {
                        continue;
                    }

                    if($row['count'] <= 10)
                    {
                        $s1 = $row['section'];
                        $l1 = $row['courselevel']; 

                        if($s1 == "1")
                        {
                            $staffcount_section += $row['count'];
                           

                            
                        }elseif($s1=="2")
                        {
                            $staffcount_full += $row['count'];
                        }
                       

                        $result = "100";
                         $total += 100;
                         $half += 100;

                    }
                    else
                    {
                        

                        $s1 = $row['section'];
                        $l1 = $row['level'];
                        $cl = $row['courselevel'];

//INTERCHANGE staffcount_sction $ _full after interchanging the sections

                        // for section 
                        if($s1 == "2")
                        {
                            // echo 'full = '.$row['count'].'<br.';
                            // $staffcount_section += $row['count'];
                            $staffcount_full += $row['count'];

                            // $s1 = "1";
                            $s1 = "2";
                        }
                        else if($s1=="1")
                        {
                            // echo 'section = '.$row['count'].'<br>';
                            // $staffcount_full += $row['count'];
                            $staffcount_section += $row['count'];

                            // $s1 = "2";
                            $s1 = "1";
                        }

                        // for level

                        if($l1 == "1")
                        {
                            $l1 = "1";
                        }else if($l1=="2")
                        {
                            $l1 = "2";
                        }
                        if($cl == "1/2/3")
                        {
                            $cl = "1/2/3";
                        }else if($cl=="4/5")
                        {
                            $cl = "4/5";
                        }

                        $que = "SELECT * FROM `bill entry` WHERE section = '$s1' AND purpose = 'paper checking' AND level = '$l1' AND courselevel = '$cl';";
                
                        $r = mysqli_query($con,$que);
                        $data = mysqli_fetch_assoc($r);
                       
    
                        $value = $data['rate'];
                        $result = strval($row['count'] * $value);
                        $total += $row['count'] * $value;
                        $half += $row['count'] * $value;

                    }

                    ?>
        <tr>
                    <td><?php echo $sr; ?></td>
                    <td><?php echo $row['coursecode']; ?></td>
                    <td><?php if ($row['section'] == '1') {
										echo 'SECTION';
									}else if ($row['section'] == '2') {
										echo 'FULL';
									}else if($row['section'] == '-'){
										echo '-';
									} ?></td>
                    <td><?php 
                    if ($row['level'] == '1') {
                        echo '34/36/40';
                    }else if ($row['level'] == '2') {
                        echo '70/80';
                    }else if($row['level'] == '-'){
                        echo '-';
                    }
                    ?></td>
                    <td><?php echo $row['courselevel']; ?></td>
                    <td><?php echo $row['count']; ?></td> 
                                     
                    <td><?php echo $result; ?></td>                    
                                       
                </tr>
                    <?php
                }

                ?>
                </table>
                <!-- total Here -->
                <br>
    <center>   <span id="caption"> Total Payment for assesment : <?php echo $half; ?> </span> <center>
                <?php
                $pay1 = $half;
            
                    $half = 0;
                ?>
                <br>
                <br>


                <center><span id="caption">As Moderation Details </span> </center>
                <br>
<table width="100%" id="mytb">
                <tr>
                     <th>Sr No</th>
                    <th>Subject Code</th>
                    <th>Section</th>
                    <th>Paper Marks</th>
                    <th>Course Level</th>
                    <th>Paper Count</th>
                    <th>Total Amount</th>

                </tr>
                <?php 
                 $sr = 0;
                $sql = "SELECT * FROM `packets` WHERE `moderator` = '$staffName'  ORDER BY `program` ASC";
                $res = mysqli_query($con, $sql);
                if(mysqli_num_rows($res) <= 0)
                {
                    ?>
                    <tr>
                    <td>NA</td>
                    <td>NA</td>
                    <td>NA</td>
                    <td>NA</td>
                    <td>NA</td>
                    <td>0</td>
                    <td>0</td>                   
                    </tr>
                <?php
                }

                while($row = mysqli_fetch_assoc($res)){
                    $sr = $sr + 1; 
                    $value = 0;
                    $result = "";

                    if($row['moderator_count'] == 0)
                    {
                        continue;
                    } else {
                    
                        $s1 = $row['section'];
                        $l1 = $row['level'];
                        $cl = $row['courselevel'];
                        

                        // for section 
                        if ($s1 == "1") {
                           
                            $moderatorcount_section += $row['moderator_count'];
                            
                            $s1 = "1";
                        } elseif ($s1 == "2") {
                            
                            $moderatorcount_full += $row['moderator_count'];

                            $s1 = "2";
                        }

                        // for level
                        if ($l1 == "1") {
                            $l1 = "1";
                        } elseif ($l1 == "2") {
                            $l1 = "2";
                        }
                        // for courselevel
                        if($cl == "1/2/3"){
                            $cl = "1/2/3";
                        }
                        else if($cl=="4/5")
                        {
                            $cl = "4/5";
                        }
                        

                    }
                    // if($s1 == "2"){
                        $que = "SELECT * FROM `bill entry` WHERE`section` = '$s1' AND  `purpose` = 'moderator' AND `level` = '$l1' AND `courselevel` = '$cl'; ";
                
                        $r = mysqli_query($con,$que);
                        $data = mysqli_fetch_assoc($r);
                        $value = $data['rate'];
                        $result = strval($row['moderator_count'] * $value);
                        $total += $row['moderator_count'] * $value;
                        $half += $row['moderator_count'] * $value;
                    // }
                    ?>
        <tr>
                    <td><?php echo $sr; ?></td>
                    <td><?php echo $row['coursecode']; ?></td>
                    <td><?php 
                    if ($row['section'] == '1') {
                        echo 'SECTION';
                    }else if ($row['section'] == '2') {
                        echo 'FULL';
                    }else if($row['section'] == '-'){
                        echo '-';
                    }
                    ?></td>
                    <td><?php if ($row['level'] == '1') {
										echo '34/36/40';
									}else if ($row['level'] == '2') {
										echo '70/80';
									}else if($row['level'] == '-'){
										echo '-';
									} ?></td>
                    <td><?php echo $row['courselevel'];?></td>
                    <td><?php echo $row['moderator_count']; ?></td>                    
                    <td><?php echo $result; ?></td>                    
                </tr>
                    <?php
                }

                ?>
                </table>
                <br>
                <center>   <span id="caption"> Total Payment for moderation : <?php echo $half; ?> </span> <center>
                <?php
                $pay2 = $half;
                    $half = 0;
                ?>



<!-- Model Answer Section -->
                <br> <br>
                <center> <span id="caption">Model answer Details</span> </center>
                <br>
    <table width="100%" id="mytb" >
                <tr>
                     <th>Sr No</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Section</th>                  
                    <th>Total Amount</th>

                </tr>
                <?php 
                 $sr = 0;
                $sql = "SELECT * FROM `model_answer` WHERE `staff` = '$staffName'";
                $res = mysqli_query($con, $sql);

                if(mysqli_num_rows($res) <= 0)
                {
                    ?>
                    <tr>
                    <td>NA</td>
                    <td>NA</td>
                    <td>NA</td>
                    <td>NA</td>
                    <!-- <td>NA</td>
                    <td>0</td>   -->
                    <td>0</td>              
                    </tr>
                <?php
                }

                while($row = mysqli_fetch_assoc($res)){
                    $sr = $sr + 1; 
                    $value = 0;
                    // if( $row['section'] == 1)
                    // {
                    //     $value = 150;
                    // }
                    // elseif ( $row['section'] == 2) {
                    //     $value = 300;
                    // }

                    $d1 = $row['section'];
                 
                    

                    $que = "SELECT * FROM `bill entry` WHERE `section` = '$d1'  AND `purpose` = 'Model answer'; ";
                    $r = mysqli_query($con,$que);
                    $data = mysqli_fetch_assoc($r);

                    $value = $data['rate'];

                    $total += $value;
                    $half += $value;
                    ?>
        <tr>
                    <td><?php echo $sr; ?></td>
                    <td><?php echo $row['course']; ?></td>
                    <td><?php echo $row['coursecode']; ?></td>
                    <td><?php 
                    if ($row['section'] == '1') {
                        echo 'SECTION';
                    }else if ($row['section'] == '2') {
                        echo 'FULL';
                    }else if($row['section'] == '-'){
                        echo '-';
                    }
                     ?></td>                    
                    <td><?php echo $value; ?></td>                    
                </tr>
                    <?php
                }

                ?>
                </table>
                <br>
                <center>   <span id="caption"> Total Payment for model answer : <?php echo $half; ?> </span> <center>
                <?php
                $pay3 = $half;
                    $half = 0;
                ?>




<br><br>
<center><span id="caption">Convence Allowance</span> </center>
<br>
<table width="100%" id="mytb" >
                <tr>
                    <th>Total Paper Checked</th>
                    <th>Section</th>
                    <th>Paper Marks</th>
                    <th>Course Level</th>
                    <th>Days Taken</th>
                    <th>Amount</th>

                </tr>
                <?php 
                 
                $sql = "SELECT * FROM `staff_details` WHERE `staff_name` = '$staffName'";
                $res = mysqli_query($con, $sql);

                $row = mysqli_fetch_assoc($res);

                
                if(strcmp("GP KOLHAPUR",$row['inst_name']) == 0 &&  preg_match("/VISITING LECTURER/", $row['designation']) == 1  )
                {
                    $paper_total_section = 0;
                    $paper_total_full = 0;
                    $sec_con = 0;
                    $full_con = 0;
                    $sec_day = 0;
                    $full_day = 0;
                    // echo $staffcount_section . '    '.$moderatorcount_section;
                    $paper_total_section = $staffcount_section + $moderatorcount_section;
                    $paper_total_full = $staffcount_full + $moderatorcount_full;
                    

                    // for section
                   if($paper_total_section == 0)
                   {
                      $sec_con = 0;
                   }
                   else
                   {
                    $sql = 'SELECT rate from `bill entry` WHERE `purpose` = "Convience Allowance"';
                    $allw = mysqli_query($con,$sql);
                    $convalrate = mysqli_fetch_array($allw);
                      $sec_con = round(($paper_total_section / 60)) *$convalrate['rate'];
                      $sec_day = round(($paper_total_section / 60));
                        // echo $paper_total_section;
                   }

                   // for full
                   if($paper_total_full == 0)
                   {
                    $full_con = 0;
                   }
                   else
                   {
                    $sql = 'SELECT rate from `bill entry` WHERE `purpose` = "Convience Allowance"';
                    $allw = mysqli_query($con,$sql);
                    $convalrate = mysqli_fetch_array($allw);

                    $full_con = round(($paper_total_full / 30)) * $convalrate['rate'];
                    $full_day =  round(($paper_total_full / 30));
                   }

                   $convence = $sec_con + $full_con;
                   $total += $convence;
                    ?>
                     <!-- for section -->
                    <tr>
                    <td><?php echo $paper_total_section; ?></td>
                    <td>Section</td>
                    <td>-</td>
                    <td>-</td>
                    <td><?php echo $sec_day; ?></td>
                    <td><?php echo $sec_con; ?></td>                   
                    </tr>

                    <!-- Without section -->
                    <tr>
                    <td><?php echo $paper_total_full; ?></td>
                    <td>Full</td>
                    <td>-</td>
                    <td>-</td>
                    <td><?php echo $full_day; ?></td>
                    <td><?php echo $full_con; ?></td>                   
                    </tr>
                <?php
                }
/*
                                   
                                    
                                   
                                    
                                    Lecturer
								
                                   
                                    Assosciate Proffessor
                                   
*/

                else if(strcmp("GP KOLHAPUR",$row['inst_name']) != 0 && preg_match("/Principal|Head of Department|Lecturer| Selection Grade Lect-I|Selection Grade Lect-II| Assistant Proffessor| Proffessor/i", $row['designation']) ==1 )
                {
                    $paper_total_section = 0;
                    $paper_total_full = 0;
                    $sec_con = 0;
                    $full_con = 0;
                    $sec_day = 0;
                    $full_day = 0;

                    $paper_total_section = $staffcount_section + $moderatorcount_section;
                    $paper_total_full = $staffcount_full + $moderatorcount_full;
                    // echo " ". $paper_total_section . " ";
                    // echo $paper_total_full;

                    // for section
                   if($paper_total_section == 0)
                   {
                      $sec_con = 0;
                   }
                   else
                   {
                    $sql = 'SELECT rate from `bill entry` WHERE `purpose` = "Convience Allowance"';
                    $allw = mysqli_query($con,$sql);
                    $convalrate = mysqli_fetch_array($allw);
                      $sec_con = round(($paper_total_section / 60)) * $convalrate['rate'];
                      $sec_day = round(($paper_total_section / 60));
                   }

                   // for full
                   if($paper_total_full == 0)
                   {
                    $full_con = 0;
                   }
                   else
                   {
                    $sql = 'SELECT rate from `bill entry` WHERE `purpose` = "Convience Allowance"';
                    $allw = mysqli_query($con,$sql);
                    $convalrate = mysqli_fetch_array($allw);
                    $full_con = round(($paper_total_full / 30)) *$convalrate['rate'];
                    $full_day =  round(($paper_total_full / 30));
                        
                   }

                   $convence = $sec_con + $full_con;
                   $total += $convence;
                    ?>
                     <!-- for section -->
                    <tr>
                    <td><?php echo $paper_total_section; ?></td>
                    <td>Section</td>
                    <td>-</td>
                    <td>-</td>
                    <td><?php echo $sec_day; ?></td>
                    <td><?php echo $sec_con; ?></td>                   
                    </tr>

                    <!-- Without section -->
                    <tr>
                    <td><?php echo $paper_total_full; ?></td>
                    <td>Full</td>
                    <td>-</td>
                    <td>-</td>
                    <td><?php echo $full_day; ?></td>
                    <td><?php echo $full_con; ?></td>                   
                    </tr>
                <?php
                }
                else
                {
                    ?>
                    <tr>
                    <td>NA</td>
                    <td>NA</td>
                    <td>NA</td>
                    <td>NA</td>
                    <td>0</td>   
                    <td>0</td>                 
                    </tr>
                <?php
                }
            ?>
        </table>
        <br>
 <center>   <span id='caption'> Total Payment for Convence Allowance : <?php echo $convence; ?> </span> <center>

<br>

             <center>   <span id="caption"> Total Payment : <?php echo $total; ?> </span> <center>
<br>
             <span>
             I hereby undertake to refund amount paid to me in excess of amount due. I further state that I have no objection to any change subsequently made in the bill as per rules of the Institute. I also undertake to refund the amount that may be deducted after the payment.
            </span>
            <p><h4>Bill Passed For Rs. <?php 
           $number = $total;
              $no = floor($number);
              $point = round($number - $no, 2) * 100;
              $hundred = null;
              $digits_1 = strlen($no);
              $i = 0;
              $str = array();
              $words = array('0' => '', '1' => 'one', '2' => 'two',
               '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
               '7' => 'seven', '8' => 'eight', '9' => 'nine',
               '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
               '13' => 'thirteen', '14' => 'fourteen',
               '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
               '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
               '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
               '60' => 'sixty', '70' => 'seventy',
               '80' => 'eighty', '90' => 'ninety');
              $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
              while ($i < $digits_1) {
                $divider = ($i == 2) ? 10 : 100;
                $number = floor($no % $divider);
                $no = floor($no / $divider);
                $i += ($divider == 10) ? 1 : 2;
                if ($number) {
                   $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                   $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                   $str [] = ($number < 21) ? $words[$number] .
                       " " . $digits[$counter] . $plural . " " . $hundred
                       :
                       $words[floor($number / 10) * 10]
                       . " " . $words[$number % 10] . " "
                       . $digits[$counter] . $plural . " " . $hundred;
                } else $str[] = null;
             }
             $str = array_reverse($str);
             $result = implode('', $str);
             $points = ($point) ?
               "." . $words[$point / 10] . " " . 
                     $words[$point = $point % 10] : '';
             echo $result . "Rupees  ";
            ?> 
             Only</h4> <span style="width:50px;"> </span>  </p>
            <br>
            <br>
            <br>
            <!-- <span></span>
         -->
         <div style="margin-left: -30em;">
         <span>Bill Passed for Rs ... ... ... <br><br>
            Rupees ... ... ... ... ... ...<br><br>
            ... ... ... ... ... ... ... only
            <span >
         </div>
         &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Signature of Examiner</span> <br> <br><br><br>
            <br><br>
            <span> Officor In Charge &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> 
            <span> Controller of Examination  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
            <span> Account Officer  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
            <span> Principal Of GPKP  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>

            <form method="get" action="new.php" >
                <input type="hidden" name="staffname" value="<?php echo $staffName ?>" />
                <input type="hidden" name="order" value="<?php echo $staffData1['order'] ?>" />
                
                <input type="hidden" name="pay1" value="<?php echo $pay1 ?>" />
                <input type="hidden" name="pay2" value="<?php echo $pay2 ?>" />
                <input type="hidden" name="pay3" value="<?php echo $pay3 ?>" />
                <input type="hidden" name="convence" value="<?php echo $convence ?>" />
                <input type="hidden" name="total" value="<?php echo $total ?>" />
                <input type="hidden" name="acc" value="<?= $staffData['account no']?>"/>
                <input type="hidden" name="ifsc" value="<?= $staffData['IFSC code']?>"/>
<div class="links">

    <input type="submit" class="backbtn" id="save" name="save" value="Save & Print"  <?php if(isset($_SESSION['printtb'])) {
        echo 'hidden';
    }?> />
                   <button class="backbtn" <?php if(isset($_SESSION['printtb'])) {
        unset($_SESSION['printtb']);
        echo 'hidden';
    }?>> <a href="dashboard.php" style="color:#000;text-decoration:none">Go Back</a> </button> 
                </div>
            </form>

            </body>
            <script>
                window.addEventListener("keydown",(event)=>{
		if (event.ctrlKey && event.key === "p") {
    event.preventDefault(); // Prevent the default Ctrl+P behavior
  }
	})
            </script>
            <script>
                let name = <?= json_encode($_GET['staffname'])?>;

                document.title = name.toUpperCase() + ' BILL'
 


                </script>
</html>