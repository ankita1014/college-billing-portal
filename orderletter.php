<?php
session_start();
include 'connect.php';
$sql = 'SELECT *FROM tbllacmaster WHERE srno = 1';
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
//print_r($_SESSION);


/*
// if (!($_SESSION['login'] == 'lac')) {
//     echo '<script>location.href="../index.php"</script>';
//}


if (!($_SESSION['login'] == 'lac')) {
    echo '<script>location.href="index.html"</script>';
}
*/
$date = date('d-m-Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>    

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Nova+Cut&family=Nunito+Sans:opsz@6..12&display=swap');


            body {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                font-family: 'Times New Roman', Times, serif;
                color: black;
                font-size: 13px;
                
            }
            .exform {
                display: flex;
                height: auto;
                content: "";
                width: 50em;
                flex-direction: column;
                border: 1px solid black;
                padding: 30px 30px;
                line-height: 23px;
            }

            .exform>div:nth-child(3) {
                display: inline-flex;
                padding: 0px 10px;

                justify-content: space-between;
                font-family: 'Nunito Sans';
                font-size: 13px;
            }

            .exform .para {

                padding: 10px 30px;
                font-family: 'Times New Roman', Times, serif;
                font-size: 13px;

            }

            .exform .para span {
                content: "";
                padding-left: 100px;

            }

            .exform .para~div {
                display: flex;
                justify-content: flex-start;
                padding: 0px 30px;
                font-size: 13px;
            }

            .exform header div {
                display: flex;
                justify-content: space-evenly;
                align-items: center;
            }

            .exform header div .collegeheader {
                text-align: center;
                justify-content: center;
                display: inline-block;
            }
        </style>
</head>
<body>
<section class="exform">
                <header>
                  
                

                       <div>
                        <img src="dte.gif" height="90px" width="120px" alt="">
                        <div class="collegeheader">
                            <div>
                                <span style='font-size:large;'><strong>Government Polytechnic Kolhapur</strong></span>
                            </div>
                            <div>
                                <span style='font-size:medium;'>(An Autonomous Institute of Maharashtra)</span>
                            </div>
                            <div>

                                <span>Vidyanagar Kolhapur</span>
                            </div>
                        </div>
                        <img src="logo2.png" height="80px" width="80px" alt="">
                    </div>
                    <div><span style="word-spacing:10px;"> Email:
                            gpkolhapur@yahoo.com  TeleNo. 0231-2521038 FaxNo. 0231-251016 </span></div>

                </header>
                <div>

                    <hr style="height:3px;">
                </div>
                <div>

                    <p><span id="clgName">No GPKP</span>/Exam/LAC/SUMMER/2023/04/ 
                        <?php echo $_SESSION['examiner']['id']; ?>
                    </p>
                    <p><Span id="date">Date :
                            <?= $date; ?>
                        </Span></p>
                </div>
                <u>
                    <h2 style="text-align: center;text-transform:uppercase; font-size:22px"><strong>
                            CONFIDENTIAL
                        </strong></h2>
                </u>

                <strong>
                    To,

                </strong>
                
                <div>
                    <strong>

                        <span id="clientName">
                            <?php if($_SESSION['examiner']['type'] == 'internal'){ ?>
                            <?php echo strtoupper($_SESSION['examiner']['intname']);}
                            else if($_SESSION['examiner']['type'] == 'external'){
                                echo strtoupper($_SESSION['examiner']['extname']);
                            }
                            ?>
                        </span>
                    </strong>
                    <br>
                    <?php echo strtoupper($_SESSION['examiner']['designation']); ?>

                    <br>
                    <?php echo strtoupper($_SESSION['examiner']['college']); ?>
                </div>

                <br>
                <center> <strong>Subject</strong> :- Appointment of <strong>
                <?php if($_SESSION['examiner']['type'] == 'external'){ echo "External Examiner";}else if($_SESSION['examiner']['type'] == 'internal'){
                    echo "Internal Examiner";
                } ?>    
                </strong> for <strong>Practical </strong>Examination</center>

                <br>
                Sir,
                <br>
                <div class='para'>
                    <span>

                        I have pleasure to inform you that you have been appointed as  <?php if($_SESSION['examiner']['type'] == 'external'){ echo "External Examiner";}else if($_SESSION['examiner']['type'] == 'internal'){
                    echo "Internal Examiner";
                } ?>  Internal/External
                    </span>
                    Examiner for the following courses of  <?php
                     echo $row['semester'].' EXAMINATION '.$row['year'];?> ,
                     <table width="95%" border="1" >
                     <tr align="center">
                        <th>Sr. No</th>
                        <th>Programme</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Date and Time</th>
                        <th>Venue</th>
                        <th>Internal examiner</th>
                     </tr>
                     <tr>
                        <td>1</td>
                        <td><?php echo strtoupper($_SESSION['examiner']['programe']); ?></td>
                        <td><?php echo strtoupper($_SESSION['examiner']['Course Code']); ?></td>
                        <td><?php echo strtoupper($_SESSION['examiner']['Course Name']); ?></td>
                        <td><?php echo strtoupper($_SESSION['examiner']['date']); ?><br><?php echo strtoupper($_SESSION['examiner']['time']); ?></td>
                        <td> G P Kolhapur<?php //echo strtoupper($_SESSION['examiner']['college']); ?></td>
                        <td><?php echo strtoupper($_SESSION['examiner']['intname']); ?></td> 
                     </tr>
                     </table>
                     <br>
                   You are
                    hereby requested to convey your acceptance. Since thetimetable is already 
                    intimated to students,if is not possible to change the same .<br>
                    Your co-operation in this matter is highly appreciated.
                   <!-- <?php
                    //echo $date
                        ?>
                    at 10:30 a.m, in Local Assessment Center,
                    Government Polytechnic Kolhapur.


                    <br>
<br>
                    
                    Please convey your acceptance immediately.
                    <br>
                    <br>
                
                    Please note that TA/DA will be borne by this Institute for the external examiners outside
                    Kolhapur.
        -->
                    <br>
                    <br>
                    <strong>Thanking you,</strong>
                </div>

                <div style='display:flex;justify-content:flex-end;'>
                    <div style="text-align:center;">

                        <span>Yours Faithfully</span>
                        
                        <br>
                        <br>
                        
                        <span>
                            <?= $_SESSION['examiner']['cofc']?>
                            <br>
                            Principal,
                            <br>
                            Government Polytechnic Kolhapur

                        </span>

                    </div>
                    <div>
                        
                      
                    </div>
                </div>
                <div style="display: flex; justify-content:space-between">
                    <div>
                        <strong> The Prinicpal</strong> <br>
                        <strong>
                            <?php echo strtoupper($_SESSION['examiner']['college']); ?>
                        </strong> <br>
                        Kindly depute the concerned staff member for the  LAC <?=  $row['semester'].' '.$row['year'];?>.

                    </div>
                    <div>
                    <?php
              
                   
                    
                    ?>
                    </div>
                </div>


            </section>
            <div>
                <span>This is computer generated copy no signature is required</span>
            </div>

            <script src="script.js">
            </script>
          <script>
            let title =  <?= json_encode($_SESSION['examiner']['name']); ?>;
            window.document.title = title
           window.print()
          </script>
        </body>

    
</body>
</html>