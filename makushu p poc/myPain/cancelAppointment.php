<?php
	include 'db.php';
			
	if(isset($_POST['delete']))
	{
		$checkbox = $_POST['checkbox']; 
		$countCheck = count($_POST['checkbox']);

		for($a=0;$a<$countCheck;$a++)
		{
			$del_id = $checkbox[$a];
			$sql = mysql_query("SELECT * FROM book WHERE id ='$del_id'");
                        
                       $result = mysql_query("DELETE FROM book WHERE id ='$del_id'");
			
                       }
                       
			if($result)
		         {	
                             echo "<script>alert('Appointment is deleted');window.location='details.php';</script>";    
			}
			else
			{
                            echo "<script>alert('An error occured, please try again');window.location='details.php';</script>";    
                        }
	}
?>


