<?php
session_start();
include('connect.php');

/*if (!($_SESSION['login'] == 'lac')) {
    echo '<script>location.href="../index.php"</script>';
}
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="s.css">
    <style>
        .links {
            width: 100%;
            height: 10px;
            margin: 40px 0px 40px 0px;
            margin-top: 20px
        }

        .backbtn {
            margin: 10px 0px 10px 10px;
            padding: 10px;
            background: lightgreen;
           
        }
        .backbtn a{
            text-decoration: none;
            color: black;
        }

        body
        {
            padding : 30px;
        }

        h3
        {
            color:blue;
        }
        table{
			border-collapse: collapse;
		}

		tr,th,td{
			border : 1px solid black;
			text-align: center;
			font-size: 18px;
			padding: 10px;
		}
    </style>
</head>
<body>

<div class="links">
        <button class="backbtn"> <a href="dashboard.php">Go Back</a> </button>
        <button class="backbtn" id="printtb1">Print </button>
    </div>
<table width="100%" id="mytb1" style="padding: 50px 100px; border: 1px solid black">
                <tr>
                    <th>Bill Id</th>
                    <th>Name</th>
                    <!-- <th>Designation </th> -->
                    <th>Department</th>
                    <!-- <th>Order</th> -->
                    <th>Account no</th>
                    <th>IFSC Code</th>
                    <th>Payment As Examiner</th>
                    <th>Payment As Moderator</th>
                    <th>Payment for Model Answer</th>
                    <th>Payment Convence Allowance</th>
                    <th>Total Payment</th> 
                </tr>
                <?php
                $sr = 0;
                $staff_total = 0;
                $mode_total = 0;
                $modelans_total = 0;
                $con_total = 0;
                $over_total = 0;

                $sql = "SELECT * FROM `bill_history` ORDER BY `id` ASC";
                $res = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($res)){

                        $sr = $sr + 1; 

                        $staff_total += $row['staff_total'];;
                        $mode_total +=  $row['modetor_total'];;
                        $modelans_total +=  $row['modelans_total'];;
                        $con_total += $row['convence'];;
                        $over_total += $row['total'];;
                    ?>
                        <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <!-- <td><?php echo $row['designation']; ?></td> -->
                        <td><?php echo $row['department']; ?></td>
                        <!-- <td><?php echo $row['order']; ?></td> -->
                        
                        <td><?php echo $row['acc_no']; ?></td>
  <td><?php echo $row['ifsc_code']; ?></td>

                    <td><?php echo $row['staff_total']; ?></td>  
                    <td><?php echo $row['modetor_total']; ?></td>  
                    <td><?php echo $row['modelans_total']; ?></td> 
                    <td><?php echo $row['convence']; ?></td>
                    <td><?php echo $row['total']; ?></td>                      
                </tr>
                    <?php
                    }       
                ?>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <!-- <td></td> -->
                        <!-- <td></td> -->
                        <td>Total</td>
                    <td><?php echo $staff_total ?></td>  
                    <td><?php echo $mode_total ?></td>  
                    <td><?php echo $modelans_total ?></td> 
                    <td><?php echo $con_total ?></td>
                    <td><?php echo $over_total ?></td>
                </tr>
                </table>

            </body>
            <script>
	window.addEventListener('keydown',(event)=>{
		if (event.ctrlKey && event.key === 'p') {
    event.preventDefault(); // Prevent the default Ctrl+P behavior
  }
	})

       document.getElementById("printtb1").addEventListener("click", function() {
    var table = document.getElementById("mytb1");
    var newWin = window.open('', '_blank');
    newWin.document.write('<html><head><title>Print Table</title>');
    newWin.document.write('<style>');
    newWin.document.write('table { border-collapse: collapse; width: 100%; }');
    newWin.document.write('th, td { border: 1px solid black; padding: 8px; text-align: left; }');
    newWin.document.write('</style>');
    newWin.document.write('</head><body>');
    newWin.document.write('<table>');
    newWin.document.write(table.innerHTML);
    newWin.document.write('</table>');
    newWin.document.write('</body></html>');
    newWin.addEventListener("keydown",(event)=>{
		if (event.ctrlKey && event.key === "p") {
    event.preventDefault(); // Prevent the default Ctrl+P behavior
  }
	})
    newWin.document.close();
    newWin.print();
});

    </script>
            </html>