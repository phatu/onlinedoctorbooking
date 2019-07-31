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
				<form name="f" action="change.php" method="POST">
					<table align="center">
						
						<tr><td>DATE AND TIME</td></tr>
						<tr><td>Your scheduled date and time</td><td><label name="old"><?php $old = $row['dateAndTime']; echo $old; ?></label></td></tr>

						<tr>
						<tr><td>NEW DATE AND TIME</td>
						<td>
				<select name="dt">
				  <option>SELECT DATE AND TIME</option>
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

		<tr><td>REASON</td>
			<td><input type="text" name="rsn" value="<?php echo $row['reason']; ?>" /></td></tr>

		<tr><td colspan="2" align="center"><p class="button-style"><input type="submit"  class="is" id="x"  title="Click To Update"  name="reschedule" value="RESCHEDULE APPOINTMENT" align="center" class="cls1"/></p></td></tr>

		</table>
		</form>
				  
				  <?php echo $old;
				?>
									</div> 
						</div>
					</div>
			</div>
		</body>
	</html>

	<?php
	}
	else
	{
		header('location:details.php');
	}
	?>