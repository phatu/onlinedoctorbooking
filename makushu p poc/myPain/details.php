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
    
			<table align="center">
                 <tr>
                     <td><img src="logo.jpg" width="200" height="200px"></td>
                     <td><h1>YOUR PAIN IS MY PAIN TO FIX</h1></td>
                 </tr>
            </table>
			<center>
        <?php
		
			//page with database basics included
            include 'db.php';

			//starting session
            session_start();
            $sess_user = $_SESSION['sess_user'];

			//function to ask user if they want to delete an appointment
            function confirmdelete()
            { 
                confirm("Are you sure you want to delete?");  
            }

			//getting data from register database
            $logged = "SELECT * FROM register WHERE cell = '$sess_user'";
            $result = mysql_query($logged);
            while($disp = mysql_fetch_array($result)) {
                $fname = $disp['fname'];
                $cell = $disp['cell'];
            }
     
			
			//user name and appointments displayed
            echo 'Good day ' . $fname; 
            ?>
     
            <br/>

            <h2>HERE ARE YOUR APPOINTMENTS</h2>
            <br/>
            
                        <!-- form that displays patient bookings -->
            <form method='POST' name='form' id='form' action='cancelAppointment.php' onsubmit='confirmdelete()'>
                <table align="center" id="show">
                    <tr>              
                            <td><b>DATE AND TIME</b></th>
                            <td><b>REASON FOR APPOINTMENT</b></td>
                            <td><b>RESCHEDULE APPOINTMENT</b></td>
                            <td><b><input type='submit' value='DELETE' name='delete'></b></td>
                    </tr>

                        <?php
                            $reveal = "SELECT * FROM book WHERE cell = '$sess_user'";
                            $result1 = mysql_query($reveal);
                            while($display = mysql_fetch_array($result1)) {
                        ?>
                    <tr>
                            <td> <?php echo $display['dateAndTime']; ?> </td>
                            <td> <?php echo $display['reason']; ?> </td>                
                                 <?php echo "<td><a href='reschedule.php?dateAndTime={$display['dateAndTime']}'>"; ?>RESCHEDULE</a></td>
                        <?php 
                                
        
                 $id1=$display[3];
            
               echo "<td><input type='checkbox' name='checkbox[]' id='checkbox[]' value=$id1></td>";
        
        
                                   
                            }
                        ?>
                    </tr>  					
                </table>
            </form>
   
			<table align="center">
				<tr>
					<td>
						<a href="appointment.php">BOOK APPOINTMENT</a>
					</td>
				</tr>
				<tr>
					<td>
						<a href="index.php">LOGOUT</a>
					</td>
				<tr>
					<td>
						<h3>Designed by Phatutshedzo Makushu</h3>
					</td>
				</tr>
			</center>
			
    
    

            
            </table>
        <?php 
        if(!isset($_COOKIE['loggedin']))
        {
            header("location:index.php");
        }
        ?>     

            <script src="confirmDelete.js"></script>
    </body>
</html>


