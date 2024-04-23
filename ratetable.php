<?php
session_start();
include('connect.php');
// if (!($_SESSION['login'] == 'lac')) {
// 	echo '<script>location.href="../index.php"</script>';
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- <link rel="stylesheet" href="../style.css"> -->
   
	<style>
		    
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
    <title>Document</title>
</head>
<body>
<div>
<?php
           $sql2 = "SELECT * FROM `tbllacmaster`;";
           $res2 = mysqli_query($conn, $sql2); 
           $staffData1 = mysqli_fetch_assoc($res2);
        ?>
    <center> <span> Form No. 9 </span> <span> L.A.C Work</span> </center>
        <center><span id="title"> Government Polytechnic Kolhapur </span></center>
        
        <center><span id="subtitle"> ( An Autonomous Institute of Govt. of Maharashtra)</span> </center>
        <br>
		<center> <span id="caption">Examiner's Fee Bill For Examination Held on <?php echo $staffData1['semester'].'   '.$staffData1['year']; ?></span> </center>
		<br>
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
<center>
<center><span id='caption'>Rate Details</span></center>
    <br>
		
	<div class="data">
				<div class="content-data">
					<table width="100%" id='mytb'>
						<tr>
							<th>Sr</th>
							<th>Mpecs</th>
							<th>Course Level</th>
							<th>Project/Internship</th>
							<th>Practical/Oral</th>
							<th>Rate</th>
							

						</tr>
						<?php
						$sql = "SELECT * FROM `bill entry`";
						$res = mysqli_query($conn, $sql);
						$i = 1;
						while ($row = mysqli_fetch_assoc($res)) {
							?>
							<tr>
								<td>
									<?php echo $i++; ?>
								</td>
								<td>
									<?php echo $row['MPECS']; ?>
								</td>
								<td>
								<?php echo $row['Course_Level']; ?>
								</td>
								<td><?php 
								
									echo $row['Project_Internship'];
								
								?></td>
								<td>
								<?php echo $row['Practical_Oral']; ?>
								</td>
								<td>
									<?php echo $row['Rate']; ?>
								</td>
								<td>
								<!--
										<a href="editrate.php?sr=<?php //echo $row['sr']; ?>" class="editbtn" ><i
										class='bx bx-edit'></i>Edit</a> -->
										<a href="billingrate.php?delsr=<?php echo $row['sr']; ?>" class="savebtn" id="modlink" ><i class='bx bx-message-square-x'></i>Remove</a>
			
										</td>
							</tr>
							<?php
						}

						?>
					</table>
</center>
<script>
        
		window.document.write('<div style="display:flex;align-items:center;justify-content:space-around;width:100%;margin-top:150px;">');
window.document.write('<div style="text-align:center;">');
window.document.write("<p>")
window.document.write("<strong>Officer In Charge L.A.C <br>");
window.document.write("Govt.Polytechnic.Kolhapur</strong>");
window.document.write("</p>");
window.document.write('</div>');
window.document.write('<div style="text-align:center;">');
window.document.write("<p>")
window.document.write("<strong>Controller of Examination <br>");
window.document.write("Govt.Polytechnic.Kolhapur</strong>");
window.document.write("</p>");
window.document.write('</div>');
window.document.write('<div style="text-align:center;">');
window.document.write("<p>")
window.document.write("<strong>Principal <br>");
window.document.write("Govt.Polytechnic.Kolhapur</strong>");
window.document.write("</p>");
window.document.write('</div>');
window.document.write('</div>');
window.print()
</script>
</body>
</html>