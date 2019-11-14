<?php 

	//page with database basics included
    include 'db.php';
		//session starts
          session_start();
          $sess_user = $_SESSION['sess_user'];

          //rescheduling user appointment
          if(isset($_POST['reschedule'])){
                    $cell = $sess_user;
                    $dt= $_POST['dt'];
			}
           
                        $s1 = mysql_query("SELECT dateAndTime from book where cell = '$sess_user'");
                        $row= mysql_fetch_array($s1);
                        $old = $row['dateAndTime'];
					//$fcout=mysql_num_fields($s);
					
			 
			$sql="UPDATE book SET dateAndTime='$dt' WHERE dateAndTime='$old'";
			$s = mysql_query($sql);
			
			   if($s)
			{
                               echo 'the change is ' . $old;
				 // echo "<script>alert('Your Information successfully! HAS Been CHanged ');window.location='details.php';</script>";
			}
			else
			{
					 echo "<script>alert('Your Information NOT! Chnage ');window.location='details.php';</script>";
				}
		?>