<?php 

	//page with database basics included
    include 'db.php';
	
		//session starts
          session_start();
          $sess_user = $_SESSION['sess_user'];

          //rescheduling user appointment
          if(isset($_POST['reschedule'])){
                    $cell = $sess_user;
			}
           $dt= $_POST['dt'];
           $rsn=$_POST['rsn'];
           $old=$_POST['old'];
			 
			$sql="UPDATE book SET dateAndTime='$dt', reason='$rsn' WHERE dateAndTime='$old'";
			$s = mysql_query($sql);
			
			   if($s)
			{
				  echo "<script>alert('Your Information successfully! HAS Been CHanged ');window.location='details.php';</script>";
			}
			else
			{
					 echo "<script>alert('Your Information NOT! Chnage ');window.location='details.php';</script>";
				}
		?>