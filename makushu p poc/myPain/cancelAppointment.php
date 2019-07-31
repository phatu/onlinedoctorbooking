<?php

	//page with database basics included
    include 'db.php';
	
	//session starts
    session_start();
    $sess_user = $_SESSION['sess_user'];
    
	//getting data from book table
    $logged = "SELECT * FROM book WHERE cell = '$sess_user'";
    $res1 = mysql_query($logged);
        
        while($disp = mysql_fetch_array($res1)) {
            $dateAndTime = $disp['dateAndTime'];
            $reason = $disp["reason"];
            
        }
        
		//delete button
        if(isset($_POST['delete'])){
           echo "DELETE BUTTON IS STILL UNDER CONSTRUCTION";
        }
        
        
//       
//        $result= mysql_query("DELETE from book where dateAndTime ='$dateAndTime' AND reason='$reason'");	
//        if($result){	
//            echo "<script>alert('Appointment deleted successfully');window.location='details.php';</script>";    
//        } else {
//            echo "<script>alert('Could not book, please try again');window.location='details.php';</script>";    
//        }
    
?>


