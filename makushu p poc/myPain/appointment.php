<!DOCTYPE html>
<html>
    <head>
        <title>Dr MYPAIN</title>
        <meta charset="UTF-8">
        <meta name="description" content="Dr Mypain online booking">
        <meta name="author" content="Phatutshedzo Makushu">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css.css">
        <link rel="stylesheet" href="theCss.css">
    </head>
    <body>
			<!--logo and slogan-->

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

        $logged = "SELECT * FROM register WHERE cell = '$sess_user'";
        $res1 = mysql_query($logged);
        
		//getting name from register database
        while($disp = mysql_fetch_array($res1)) {
            $fname = $disp['fname'];
        }
        
		
		//getting data from the appointment form
        if(isset($_POST["book"])){ 
            $cell = $sess_user;
            $dateAndTime = $_POST["dateAndTime"];
            $reason = $_POST["reason"];
			
			//validating user input
			if($dateAndTime == "selectdatetime"){
				echo "<script>alert('Please select date for appointment')</script>";
			} else if($reason == "selectReason"){
				echo "<script>alert('Please select reason for appointment')</script>";
			} else {
            $sql = "INSERT INTO book(cell, dateAndTime, reason) VALUES('$cell', '$dateAndTime', '$reason')";
            $result = mysql_query($sql);

            if($result){
                echo "Thank you $fname for booking";    
                
            } else {
                echo 'Failed to book, please try again '; 
            }
			}
        }
        ?>

		<!--user appointment form-->
        <form action="" method="POST">
            <table>
                <tr><td><h2>PLEASE DO YOUR BOOKING HERE</h2></td></tr>
                <tr><td><h3>DATE AND TIME</h3></td></tr> 
                <tr>
                    <td>
                        <select name="dateAndTime">
                            <option value="selectdatetime">SELECT DATE AND TIME</option>
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
                                            if($dateTmeDisplay == $fin){ 
                                                $dateTmeDisplay = "unavailable";
                                            }
                                        }

                                        if($dateTmeDisplay == "unavailable"){?>
                                            <option value="<?php echo $dateTmeDisplay;?>" disabled><?php echo $dateTmeDisplay;?></option>
                                        <?php }else {?>
                                            <option value="<?php echo $dateTmeDisplay;?>"><?php echo $dateTmeDisplay;
                                        }
                                    }
                                }?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><h3>REASON FOR APPOINTMENT</h3></td>
                <tr>
                    <td>
                        <select name="reason">
                            <option value="selectReason">SELECT REASON FOR APPOINTMENT</option>
                            <option value="Adult vaccination or injections (comprehensive)">Adult vaccination or injections (comprehensive)</option>
                            <option value="Glucose or Cholesterol screening test">Glucose or Cholesterol screening test</option>
                            <option value="Baby Immunisation consultation">Baby Immunisation consultation</option>
                            <option value="Baby wellness consultation">Baby wellness consultation</option>
                            <option value="Basic health screening (BP, BMI, lifestyle report)">Basic health screening (BP, BMI, lifestyle report)</option>
                            <option value="Breast examination">Breast examination</option>
                            <option value="Comprehensive Health Assessment">Comprehensive Health Assessment </option>
                            <option value="Family Planning Service">Family Planning Service</option>
                            <option value="HIV Screening Test">HIV Screening Test</option>
                            <option value="Pap smear (Selected Clinics)">Pap smear (Selected Clinics)</option>
                            <option value="Pregnancy and mother wellness">Pregnancy and mother wellness</option>
                            <option value="Pregnancy test">Pregnancy test</option>
                            <option value="Smoking Cessation">Smoking Cessation</option>
                            <option value="Specimen collection for laboratory tests">Specimen collection for laboratory tests</option>
                            <option value="Weight loss management">Weight loss management</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="BOOK APPOINTMENT" name="book" required>
                    </td>
                </tr>
            </table>
        </form>
		
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
