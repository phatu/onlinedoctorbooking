<!DOCTYPE html>
<html>
    <head>
        <title>Dr MYPAIN</title>
		  <meta charset="UTF-8">
		  <meta name="description" content="Dr Mypain online booking">
		  <meta name="author" content="Phatutshedzo Makushu">
		  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		  <link rel="stylesheet" href="theCss.css">
    </head>
		<body>
		<?php

		//session starts
		session_start();
		if($_SESSION['user']){

		//page with database basics included
		include 'db.php';
		?>
										 
			<center>
			 <h1>UPDATE YOUR SCHEDULED APPOINTMENT</h1>
						
			   <table align="center">
					<?php 
					$dateAndTime= $_GET['dateAndTime'];
					$s = mysql_query("SELECT * from book where dateAndTime='$dateAndTime'");
					$fcout=mysql_num_fields($s);
					$row= mysql_fetch_array($s);
						
				?>
					<!--reschedule form for user -->	 
			  <center>
                              <form action="" method="POST">
					<table align="center">
						
                                            <tr><td><b>DATE AND TIME</b></td></tr>
                                            <tr><td><b>Your scheduled date and time</b></td>
                                                    <td><label name="old"><?php $old = $row['dateAndTime']; echo $old; ?></label></td></tr>

						<tr>
                                                <tr><td><b>NEW DATE AND TIME</b></td>
						<td>
                                                                                                        
				<select name="dt">
				  <option value="selectDateAndTime">SELECT DATE AND TIME</option>
				<?php

				for($count =0; $count<15; $count++){
					$days = date('l jS F Y ',strtotime($count . 'days'));
					
				
					$startTime = strtotime('09:00');
					for($a=0;$a<451; $a+=30){
					$timeDisplay = date('H:i', strtotime($a .'minutes', $startTime));  
					$dateTmeDisplay = $days . $timeDisplay;
				   

					$reveal = "SELECT dateAndTime FROM book";
					$ann = mysql_query($reveal);
					while($display = mysql_fetch_array($ann)) {
					$fin = $display['dateAndTime']; 
					if($dateTmeDisplay == $fin){ $dateTmeDisplay = "unavailable";}}?>
					
				  <?php
				  if($dateTmeDisplay == "unavailable"){?>
				  <option value="<?php echo $dateTmeDisplay;?>" disabled><?php echo $dateTmeDisplay;?></option>
				  <?php }else {?>
					<option value="<?php echo $dateTmeDisplay;?>"><?php echo $dateTmeDisplay;}}}?></option>

			</select>

			</td>
		</tr>

                <tr><td><b>REASON</b></td>
                    <td><label><?php echo $row['reason']; ?></label></td></tr>

		<tr><td colspan="2" align="center"><p class="button-style"><input type="submit" title="Click To Reschedule"  name="reschedule" value="RESCHEDULE APPOINTMENT" align="center"/></p></td></tr>

		</table>
		</form>
				  
				 	
									</div> 
						</div>
					</div>
			</div>
		</body>
	</html>

	<?php
        
	}
        
	?>

        
        <?php 
    
                    $dt= $_POST['dt'];                      	
			 
			$sql="UPDATE book SET dateAndTime='$dt' WHERE dateAndTime='$old'";
			$rescheduled = mysql_query($sql);
			
			   if($rescheduled)
			{

				 // echo "<script>alert('Your appointment has been successfully rescheduled.');window.location='details.php';</script>";
			}
			else
			{
					 echo "<script>alert('Your appointment has not been rescheduled. Please try again.');window.location='details.php';</script>";
				}
		?>

        <table align="center">
		<tr>
            <td>
                <a href="details.php">BACK TO DETAILS</a>
            </td>
        </tr>
		<tr>
			<td>
				<a href="index.php">LOGOUT</a>
			</td>
		</tr>
		</table>

 <h3>Designed by Phatutshedzo Makushu</h3></center>