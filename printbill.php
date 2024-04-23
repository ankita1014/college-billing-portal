<?php
session_start();
include ('connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
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

        body {
            padding: 30px;
        }


        table {
            border-collapse: collapse;
        }


        tr,
        th,
        td {
            border: 1px solid black;
            text-align: center;
            font-size: 14px;
            padding: 3px;
        }

        th {
            font-size: 16px;
        }

        #title {

            font-size: 25px;
            font-weight: bold;
        }

        #subtitle {
            font-size: small;
        }

        #caption {
            color: blue;
            font-size: 20px;
            font-weight: semibold;
        }
    </style>
</head>

<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id != null) {
            ?>
            <center>
                <h1> Government Polytechnic Kolhapur </h1>
            </center>

            <center><span id="subtitle"><b> REMUNERATION BOLL FOR PRACTICAL/ORAL/TEAMWORK</b></span> </center>
            <br>
            <?php
            $sql2 = "SELECT * FROM `tbllacmaster`;";
            $res2 = mysqli_query($conn, $sql2);
            $staffData1 = mysqli_fetch_assoc($res2);

            ?>
            <center> <span id="subtitile">Examiner's Bill For Examination Held on
                    <?php echo $staffData1['semester'] . '   ' . $staffData1['year']; ?></span> </center>

            <div>

                <?php
                $sql = "SELECT *FROM `bill generate` WHERE sr = '$id'";
                $res = mysqli_query($conn, $sql);
                $bill_data = mysqli_fetch_array($res, MYSQLI_ASSOC);
                $internal_name = $bill_data['internal_name'];
                $external_name = ($bill_data['external_name'] != '' or $bill_data['external_name'] != null) ? $bill_data['external_name'] : null;

                $staff_query = "";
                $staff_res;
                $staffName = "";
                $staff_row;
                if ($external_name != null) {
                    $staff_query = "SELECT *FROM external_examinerorder WHERE internal_examiner = '$internal_name'";
                    $staff_res = mysqli_query($conn, $staff_query);
                    $staff_row = mysqli_fetch_array($staff_res, MYSQLI_ASSOC);
                    ?>

                    <h3>Name and College Address :-</h3>
                    <?php echo strtoupper($staff_row['External_Name'] . '   ,  ' . $staff_row['department'] . '  ,  ' . $staff_row['External_College_Name']); ?>
                    <h3>Designation :-</h3>
                    <?php echo strtoupper($staff_row['External_Designation']); ?>

                    <?php
                } else {
                    $staff_query = "SELECT *FROM staff_details WHERE staff_name = '$internal_name'";
                    $staff_res = mysqli_query($conn, $staff_query);
                    $staff_row = mysqli_fetch_array($staff_res, MYSQLI_ASSOC);
                    ?>
                    <h3>Name and College Address :-</h3>
                    <?php echo strtoupper($staff_row['staff_name'] . '   ,  ' . $staff_row['department'] . '  ,  ' . $staff_row['inst_name']); ?>
                    <h3>Designation :-</h3>
                    <?php echo strtoupper($staff_row['designation']); ?>
                    <?php
                }
                ?>
                <h5>INSTRUCTIONS :-</h5>
                <ol style="list-style:disc;">
                    <li> This bill form should be used only for the examination work related with examinations conducted at
                        Govt. Polytechnic, Kolhapur under autonomous status.</li>
                    <li> Affix revenue stamp if necessary.</li>
                    <li> Amount should NOT be carried over and brought forward from page to page. </li>
                    <li> Examiners who are Gazetted Officers must given their full designation in column provided a required by
                        Audit. </li>
                    <li> Remuneration due to Paper setter and examiner is as per rates prescribed in Governing body meeting at
                        Govt. Polytechnic, Kolhapur held on 03 -01 - 2019 which are similar to B.T.E. norms. </li>
                </ol>
            </div>


            <table width="100%" id="mytb" style="padding: 50px 100px; border: 1px solid black;">
                <tr>
                    <th colspan="4">1.For Practical/Oral Examination Work-Internal/External(For both Internal & External
                        Assesment) Rs.7/- per candidate/Examiner(Min. of Rs.150/-)</th>
                </tr>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>No.of Candidate</th>
                    <th>Amount in Rs.</th>
                </tr>
                <?php if ($bill_data['exam_type'] == 'practical' or $bill_data['exam_type'] == 'oral') { ?>
                    <tr>
                        <td><?= $bill_data['subject_code'] ?></td>
                        <td><?= $bill_data['subject_name'] ?></td>
                        <td><?= $bill_data['student_count'] ?></td>
                        <td><?= $bill_data['rate'] ?></td>
                    </tr>
                    <tr>
                        <th colspan='3'>Total</th>
                        <td><?= $bill_data['total'] ?></td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td>
                    </tr>
                    <tr>
                        <th colspan='3'>Total</th>
                        <td>NA</td>
                    </tr>
                <?php } ?>
            </table>
                    <br><br><br>
            <table width="100%" id="mytb">

                <tr>
                    <th colspan="4">2.For Practical/Oral for Project and Seminar Internal/External (For both Internal & External
                        Assesment) Rs.25/- per candidate/Examiner (Min. of Rs.150/-)
                    </th>
                </tr>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>No.of Candidate</th>
                    <th>Amount in Rs.</th>
                </tr>
                <?php if ($bill_data['exam_type'] == 'project' or $bill_data['exam_type'] == 'internship') { ?>
                    <tr>
                        <td><?= $bill_data['subject_code'] ?></td>
                        <td><?= $bill_data['subject_name'] ?></td>
                        <td><?= $bill_data['student_count'] ?></td>
                        <td><?= $bill_data['rate'] ?></td>
                    </tr>
                    <tr>
                        <th colspan='3'>Total</th>
                        <td><?= $bill_data['total'] ?></td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td>
                    </tr>
                    <tr>
                        <th colspan='3'>Total</th>
                        <td>NA</td>
                    </tr>
                <?php } ?>
            </table>
<br>
            <span>
               <b> I hereby undertake to refund amount paid to me in excess of amount due. I further state that I have no objection to any change subsequently made in the bill as per rules of the Institute. I also undertake to refund the amount that may be deducted after the payment.
                </b> </span>
            <br><br><br>
            Checked and Verified. Recommended for passing the Bill.
            </div>
         &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Signature of Examiner</span> <br> <br><br><br>
           
           
            
            <p>Total bill Passed for payment Rs. ..................
                <br>
                (Rupees ...................................................................)


                </div>
         &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Head of Department
        </span> <br> <br><br><br>
            <br><br>
            <span> Account Officer  <br> (Government Polytechnic, Kolhapur)&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> 
                    <span> Principal Of GPKP  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>



            <?php
        }
    }
    ?>
 

</body>

</html>