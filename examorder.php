<?php

session_start();
include('connect.php');
require_once 'sendmail.php';

$courses = array();
// $course_names = array();
$sql = "SELECT * from subjects";
$result = mysqli_query($conn, $sql);
$courses = mysqli_fetch_all($result, MYSQLI_BOTH);

$staff_query = "SELECT *FROM staff_details ORDER BY staff_name";
$staff_res = mysqli_query($conn,$staff_query);
$staff_row = mysqli_fetch_all($staff_res,MYSQLI_ASSOC);
// print_r($staff_row);



$sub = "Confidential Order - Appointment for assessment work at local assessment center Govt. Poly Kolhapur";
$body =  " <div class='mailtemplate'>
<h1>Confidential Order</h1>
<img src='https://cdn.dribbble.com/users/661867/screenshots/1982192/preparing-document.gif'>
<p>  Appointment for assessment work at local assessment center Govt. Poly Kolhapur
Please look up the document for detailed information.</p>
<p>For any Queries reach us at <strong>gpkolhapurlac@gmail.com</strong></p>

</div>";

$date = date('d-m-Y');
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


    <link rel="stylesheet" href="s.css">
    <title>Document</title>
    <script defer>
        var courses = <?= json_encode($courses); ?>;
        console.log(courses)
        // let view = document.getElementById('view');
        function orderletter() {
            // let newWin = window.open("orderletter.php");
            let newWin = window.open("orderletter.php");

        }
    </script>
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
    
    
    </ul>
  </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


    </section>
    <script defer>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
            }
        }
    </script>




    <!-- NAVBAR -->
    <section id="content">
        <!-- NAVBAR -->

        <!-- NAVBAR -->
        <main>
            <h1 class="title">Examiner Order</h1>
            <ul class="breadcrumbs">
                <li><a href="dashboard.php">Home</a></li>
                <li class="divider">/</li>

                <li><a href="examorder.php" class="active">Examiner Order</a></li>
            </ul>
            <div class="data">
                <div class="content-data">
                    <form method="post" action="" class="form">
                        <div class="heading">
                            Examiner Order
                        </div>
                        <div class="content">
                            <!-- <div class="form-control">
                                <label for="">Contact no.</label>
                                <input type="number" name="contactno" <?= isset($_POST['dbbtn']) ? "required" : "" ?>>
                            </div> -->
                            <div class="form-control">
                                <label for="">Subject Code</label>
                                <select name="code" id="sub_code" onchange="setsubject()" <?= isset($_POST['dbbtn']) ? "required" : "" ?>>
                                    <option value="" selected disabled>Course Code</option>
                                    <?php
                                    for ($i = 0; $i < count($courses); $i++) {
                                    ?>
                                        <option value="<?= $courses[$i]['ccode'] ?>"><?= $courses[$i]['ccode'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-control">
                                <label for="">Subject Name</label>
                                <input type="text" name="cname" id="sub_name" readonly>
                            </div>
                            <div class="form-control">
                                <label for="">Internal/External</label>
                                <input type="text" name="intr_extr" id="exam" readonly>
                            </div>


                            <div id="internal-examiner">
                                <div class="form-control">
                                    <label for="">Internal examiner</label>
                                 <?php   if(isset($staffdata['staff_name'])){ ?>
                                    <input type="text" name="sname" id="" value="<?= isset($staffdata) ? $staffdata['staff_name'] : ''; ?>">
                                    <?php }else{ ?>
                                        <select name="sname" id="" required>
                                            <?php 
                                            foreach($staff_row as $staff)
                                            {
                                                print_r($staff);
                                                ?>
                                                <option value="<?= $staff['staff_name'] ?>"><?= $staff['staff_name'] ?></option>

                                            <?php }
                                            ?>
                                            
                                        </select>
                                        <?php }?>
                                </div>
                                <div class="form-control"><label for="">Programe</label>
                                    <input name="department" value="<?= isset($staffdata['department']) ? $staffdata['department'] : ''; ?>" id="">

                                </div>

                                <div class="form-controls"><label for="">email</label>
                                    <input type="email" name="staffmail" value="<?= isset($staffdata['staffmail']) ? $staffdata['staffmail'] : ''; ?>" id="">
                                </div>
                                <div class="form-controls"><label for="">Date</label>
                                    <input type="Date" name="date" value="<?= isset($staffdata['Exam_Date']) ? $staffdata['Exam_Date'] : ''; ?>" id="">
                                </div>
                                <div class="form-controls"><label for="">Time</label>
                                    <input type="time" name="time" value="<?= isset($staffdata['Exam_Time']) ? $staffdata['Exam_Time'] : ''; ?>" id="">
                                </div>

                            </div>
                            <div id="external-examiner">
                                <label><b>
                                        <center> External Examiner</center>
                                    </b></label>
                                <div class="form-control">
                                    <div class="form-control"><label for="">Name of External Examiner</label>
                                        <input name="ext_name" value="<?= isset($staffdata['ext_name']) ? $staffdata['ext_name'] : ''; ?>" id="">
                                    </div>
                                    <div class="form-control"><label for="">Designation of External Examiner</label>
                                        <input name="ext_designation" value="<?= isset($staffdata['ext_designation']) ? $staffdata['ext_designation'] : ''; ?>" id="">
                                    </div>
                                    <div class="form-control"><label for="">College Name of External Examiner</label>
                                        <input type="text" name="ext_inst_name" id="" value="<?= isset($staffdata['ext_inst_name']) ? $staffdata['ext_inst_name'] : ''; ?>">
                                    </div>
                                    <div class="form-controls"><label for="">email</label>
                                        <input type="email" name="extmail" value="<?= isset($staffdata['extmail']) ? $staffdata['extmail'] : ''; ?>" id="">
                                    </div>

                                </div>
                            </div>
                            <div class="form-control"><input type="submit" value="Submit" name="submit" <?php //echo isset($staffdata)?"":"disabled";
                                                                                                        ?> class='btnsubmit'></div>

                    </form>
                </div>
            </div>
            <div class="data" style="overflow :scroll;">
                <div class="content-data">
                    <table id="mytb" width="100%">
                        <form method='post' enctype="multipart/form-data">
                            <form action="orderletter.php" method="post">
                                <tr>
                                    <th>sr no.</th>
                                    <th>external examiner</th>
                                    <th>External designation</th>
                                    <th>College</th>
                                    <th>External email</th>
                                    <th>Programe</th>
                                    <th>Course Code </th>
                                    <th>Course Name </th>
                                    <th>Internal examiner</th>
                                    <th>Internal email</th>
                                    <th>Date </th>
                                    <th>Time </th>
                                    <th>view</th>
                                    <th>send mail</th>

                                </tr>
                                <?php
                                $counter = 0;
                                $sql = "SELECT *FROM `external_examinerorder`";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $counter++;
                                    $_SESSION['counter'] = $counter;
                                ?>
                                    <tr>
                                        <td>
                                            <?= $counter ?>
                                        </td>
                                        <td>
                                            <?php if ($row['External_Name'] != '' or $row['External_Name'] != null) { ?>
                                                <input type="text" name="<?php echo 'extname' . $counter; ?>" id="txtfield" value="<?= $row['External_Name']; ?>" readonly>
                                            <?php } else {
                                                echo "NA";
                                            ?>
                                                <input hidden type="text" name="<?php echo 'extname' . $counter; ?>" id="txtfield" value="<?= $row['External_Name']; ?>" readonly>

                                            <?php
                                            } ?>
                                        </td>


                                        <td>
                                            <?php if ($row['External_Designation'] != '' or $row['External_Designation'] != null) { ?>

                                                <input type="text" name="<?php echo 'extdesignation' . $counter; ?>" id="txtfield" value="<?= $row['External_Designation']; ?>" readonly>
                                            <?php } else {
                                                echo "NA";
                                            ?>
                                                <input type="text" hidden name="<?php echo 'extdesignation' . $counter; ?>" id="txtfield" value="<?= $row['External_Designation']; ?>" readonly>

                                            <?php
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($row['External_College_Name'] != '' or $row['External_College_Name'] != null) { ?>

                                                <input type="text" name="<?php echo 'extcollegename' . $counter ?>" value="<?= $row['External_College_Name']; ?>" id="txtfield" readonly>

                                            <?php } else {
                                                echo "NA";
                                            ?>
                                                <input type="text" hidden name="<?php echo 'extcollegename' . $counter ?>" value="<?= $row['External_College_Name']; ?>" id="txtfield" readonly>

                                            <?php
                                            } ?>
                                        </td>


                                        <td>
                                            <?php if ($row['External_Email'] != '' or $row['External_Email'] != NULL) { ?>
                                                <input type="email" name="<?php echo 'extmail' . $counter; ?>" value="<?= $row['External_Email'] ?>" id="txtfield" readonly>
                                            <?php } else {
                                                echo "NA";
                                            ?>
                                                <input type="email" hidden name="<?php echo 'extmail' . $counter; ?>" value="<?= $row['External_Email'] ?>" id="txtfield" readonly>

                                            <?php
                                            } ?>
                                        </td>

                                        <td><input type="text" name="<?php echo 'programe' . $counter ?>" value="<?= $row['department']; ?>" id="txtfield" readonly></td>


                                        <td><input type="text" name="<?php echo 'code' . $counter; ?>" value="<?= $row['course_code'] ?>" id="txtfield" readonly></td>

                                        <td><input type="text" name="<?php echo 'cname' . $counter; ?>" value="<?= $row['course_name'] ?>" id="txtfield" readonly></td>

                                        <td>
                                            <?php if ($row['internal_examiner'] != '' or $row['internal_examiner'] != NULL) { ?>
                                                <input type="email" name="<?php echo 'intname' . $counter; ?>" value="<?= $row['internal_examiner'] ?>" id="txtfield" readonly>
                                            <?php } else {
                                                echo "NA";
                                            } ?>
                                        </td>
                                        <td>

                                            <?php if ($row['staffmail'] != '' or $row['staffmail'] != NULL) { ?>
                                                <input type="email" name="<?php echo 'staffmail' . $counter; ?>" value="<?= $row['staffmail'] ?>" id="txtfield" readonly>
                                            <?php } else {
                                                echo "NA";
                                            } ?>
                                        </td>

                                        <td><input type="date" name="<?php echo 'Date' . $counter; ?>" value="<?php echo $row['Exam_Date']; ?>" id="txtfield" readonly></td>
                                        <td><input type="text" name="<?php echo 'Time' . $counter; ?>" value="<?= substr($row['Exam_Time'], 0, 5) ?>" id="txtfield" readonly></td>

                                        <td>
                                            <button type="submit" name="<?php echo 'view' . $counter; ?>" class="viewbtn" id="view">view <i class='bx bx-file-find'></i></button>
                                        </td>

                                        <td>
                                            <div style="display:inline-flex;flex-direction:column;gap:5px;">

                                                <input type="file" name="<?php echo 'orderfile' . $counter; ?>" id="" class=".file">
                                                <button type="submit" name="<?php echo 'examorder' . $counter; ?>" style="width:30%" value="" class="savebtn">Send <i class='bx bx-envelope'></i></button>

                                            </div>
                                        </td>

                                    </tr>
                                <?php
                                } ?>
                            </form>
                    </table>
                </div>
            </div>

        </main>
    </section>
    <?php


    if (isset($_POST['submit'])) {
        $count = 0;
        // $desig = $_POST['designation'];
        $staffmail = filter_input(INPUT_POST, 'staffmail', FILTER_VALIDATE_EMAIL);
        $staff = $_POST['sname'];
        $programe = $_POST['department'];
        // $collegeName = $_POST['collegeName'];
        //  $instcode = $_POST['instcode'];
        $ccode = $_POST['code'];
        $cname = $_POST['cname'];
        $int_extr = $_POST['intr_extr'];
        $extname = isset($_POST['ext_name']) ? $_POST['ext_name'] : '';
        $extdesi = isset($_POST['ext_designation']) ? $_POST['ext_designation'] : '';
        $extclg = isset($_POST['ext_inst_name']) ? $_POST['ext_inst_name'] : '';
        $extmail = isset($_POST['extmail']) ? $_POST['extmail'] : '';
        $date = $_POST['date'];
        $time = $_POST['time'];
        $checkdata = array($staffmail, $staff, $programe, $ccode, $cname, $int_extr, $extname, $extdesi, $extclg, $extmail, $date, $time);
        //print_r($checkdata);


        $sql = "SELECT *FROM `external_examinerorder` WHERE  `internal_examiner` = '$staff'  ";
        $res = mysqli_query($conn, $sql);

        // if (mysqli_affected_rows($conn) > 0) {
        //     echo '<script>swal("Warning","Data Already Exist!","warning").then(value => location.href = "examorder.php");
        //     </script>';
        //     exit;
        // } else {
            if ($extname != '') {
                $sql = "INSERT INTO `external_examinerorder`(id,staffmail,internal_examiner,department,course_name,course_code,External_Name,External_Designation,External_College_Name,External_Email,Exam_Date,Exam_Time) VALUES(NULL,'$staffmail', '$staff','$programe','$cname','$ccode','$extname','$extdesi', '$extclg','$extmail','$date','$time')";
                $result = mysqli_query($conn, $sql);

                if (mysqli_affected_rows($conn) > 0) {
                    echo '<script>swal("Success","Data Saved Successfully!","success").then(value => location.href = "examorder.php");
                        </script>';
                    exit;
                }
            } else {
                $sql = "INSERT INTO `external_examinerorder`(id,staffmail,internal_examiner,department,course_name,course_code,Exam_Date,Exam_Time)     VALUES(NULL,'$staffmail', '$staff','$programe','$cname','$ccode','$date','$time')";
                $result = mysqli_query($conn, $sql);

                if (mysqli_affected_rows($conn) > 0) {
                    echo '<script>swal("Success","Data Saved Successfully!","success").then(value => location.href = "examorder.php");
                        </script>';
                    exit;
                }
            }
        }
    // }



    for ($i = 0; $i < $counter; $i++) {
        if (isset($_POST['examorder' . $i + 1])) {
          
            $extmail = $_POST['extmail' . $i + 1];
            $intmail = $_POST['staffmail'.$i+1];
           
            $file = $_FILES['orderfile' . $i + 1]['tmp_name'];
            $filename = $_FILES['orderfile' . $i + 1]['name'];
            if($extmail != '' and $intmail != ''){
                $mails = [$extmail,$intmail];
                $errors = [];
                for($i=0;$i<count($mails);$i++){
            if (!sendMail($mails[$i], $filename, $sub, $body, $file)) {
                array_push($errors,"failed");
            } 
        }
        if(empty($errors)){
            echo '<script>swal("Success","Sent Successfully!","success").then(value => location.href = "examorder.php");
            </script>';
        exit;
        }else{
            echo '<script>swal("Warning","Failed to send!","warning").then(value => location.href = "examorder.php");
            </script>';
            exit;
        }
        }elseif($intmail != ''){
            if (sendMail($intmail, $filename, $sub, $body, $file)) {
                echo '<script>swal("Success","Sent Successfully!","success").then(value => location.href = "examorder.php");
                </script>';
            exit;
            } else{
                echo '<script>swal("Warning","Failed to send!","warning").then(value => location.href = "examorder.php");
                </script>';
                exit;
            }
        }
        } else if (isset($_POST['view' . $i + 1])) {
            $intname = isset($_POST['intname' . $i + 1]) ? $_POST['intname' . $i + 1] : '';
            $extname = isset($_POST['extname' . $i + 1]) ? $_POST['extname' . $i + 1] : '';
            $desig = $_POST['extdesignation' . $i + 1];
            $collegeName = $_POST['extcollegename' . $i + 1];
            $cc = $_POST['code' . $i + 1];
            $cname = $_POST['cname' . $i + 1];
            $pro = $_POST['programe' . $i + 1];
            $date = $_POST['Date' . $i + 1];
            $time = $_POST['Time' . $i + 1];
            // $sname = $_POST['name' . $i + 1];
            $sql = "SELECT * FROM `external_examinerorder` WHERE `External_Name`='$extname' and internal_examiner='$intname'";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            $count = $row['id'];
            $email = '';
            $internalOrExtrnal = '';
            if ($row['External_Name'] == '' and $row['internal_examiner']!= '') {
                $email = $row['staffmail'];
                $internalOrExtrnal = 'internal';
            } else if ($row['External_Name'] != '' and $row['internal_examiner']!= '') {
                $email = $row['External_Email'];
                $internalOrExtrnal = 'external';
            }

            $sql = "SELECT * from tbllacmaster where srno = 1";
            $res = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($res);
            $examiner_data = array(
                'type'=>$internalOrExtrnal,
                'intname' => $intname,
                'extname'=>$extname,
                'designation' => $desig,
                'college' => $collegeName,
                'Course Code' => $cc,
                'Course Name' => $cname,
                'programe' => $pro,
                'date' => $date,
                'time' => $time,
                'id' => $data['order'] . '/' . $count,
                'ofc' => $data['ofc'],
                'cofc' => $data['cofc'],

            );
            $_SESSION['examiner'] = $examiner_data;
          


            echo '<script>
            orderletter();
            </script>';
            exit;
        } else {
            continue;
        }
    }
    ?>

    <?php require_once 'footer.php'; ?>
    <script src="script.js"></script>
    <script defer>
        //setting subject name on subject code

        let intexam = document.getElementById('internal-examiner')
        let extexam = document.getElementById('external-examiner')
        // let exam=document.getElementById('exam')
        intexam.style.display = 'none'
        extexam.style.display = 'none'

        function setsubject() {
            let courses = <?= json_encode($courses) ?>;
            let code = document.getElementById('sub_code');
            let subname = document.getElementById('sub_name');
            let exam = document.getElementById('exam');

            courses.forEach(course => {
                if (code.value == course.ccode) {
                    subname.value = course.cname
                    exam.value = course.internal_external
                    if (course.internal_external == 'internal') {
                        intexam.style.display = 'block'
                        extexam.style.display = 'none'
                    } else if (course.internal_external == 'external') {
                        intexam.style.display = 'block'
                        extexam.style.display = 'block'

                    }

                }
            });

        }
    </script>
</body>

</html>