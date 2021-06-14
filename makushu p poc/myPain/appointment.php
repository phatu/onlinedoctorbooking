
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
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        
        <center>
            <?php
            //page with database basics included
            include 'db.php';




            //starting session
            session_start();
            $sess_user = $_SESSION['sess_user'];


            $query = $mysqli->query("SELECT * FROM register WHERE cell = '$sess_user'") or
                    die($mysqli->error);
            $numrows = $query->fetch_array();

            //getting name from register database
            $fname = $numrows['fname'];
            $lname = $numrows['lname'];
            
            $fullName = $fname . ' ' . $lname;

            //getting data from the appointment form
            if (isset($_POST["book"])) {
                $cell = $sess_user;
                $dateAndTime = $_POST["dateAndTime"];
                $reason = $_POST["reason"];

                //validating user input
                if ($dateAndTime == "selectdatetime") {
                    echo "<script>alert('Please select date for appointment')</script>";
                } else if ($reason == "selectReason") {
                    echo "<script>alert('Please select reason for appointment')</script>";
                } else {

                    $mysqli->query("INSERT INTO book(cell, dateAndTime, reason, name) VALUES('$cell', '$dateAndTime', '$reason', '$fullName')") or
                            die($mysqli->error);

                    
                       echo "Thank you $fname for booking";


                       
                        if ($mysqli) {

                        echo "<script>alert('Thank you $fname for booking');window.location='details.php';</script>";
                    } else {
                        echo "<script>alert('Failed to book, please try again. Please try again.');window.location='details.php';</script>";
                    }


                  
                    
                }
            }
            ?>

            <!--user appointment form-->
            <form action="" method="POST">
                <table id="appointment">
                    <tr><td><h2>PLEASE DO YOUR BOOKING HERE</h2></td></tr>
                    <tr><td><h3>DATE AND TIME</h3></td></tr> 
                    <tr>
                        <td>
                            <select name="dateAndTime">
                                <option value="selectdatetime">SELECT DATE AND TIME</option>
            <?php
                            $result = $mysqli->query("SELECT * FROM book") or die($mysql->error);

            for ($count = 0; $count < 15; $count++) {
                $days = date('l jS F Y ', strtotime($count . 'days'));
                $startTime = strtotime('09:00');

                for ($a = 0; $a < 451; $a += 30) {
                    $timeDisplay = date('H:i', strtotime($a . 'minutes', $startTime));
                    $dateTmeDisplay = $days . $timeDisplay;


//double booking prevention
   $query = $mysqli->query("SELECT * FROM book WHERE dateAndTime='$dateTmeDisplay'") or
                    die($mysqli->error);

            $numrows = $query->fetch_array();

            if ($numrows != 0) {
                            $dbDateAndTime = $numrows['dateAndTime'];

               }

                if ($dbDateAndTime == $dateTmeDisplay) {
                   
  
                ?>
                                            <option value="unavailable" disabled>unavailable</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $dateTmeDisplay; ?>"><?php
                                echo $dateTmeDisplay;
                            }
  
                    }
            }
                                ?></option>
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


            <div class="container fixed-bottom">
                <nav class="navbar navbar-dark bg-dark">


                    <div class="btn-group dropup">
                        <a href="details.php">BACK TO DETAILS</a>


                    </div>

                    <div class="btn-group dropup">
                        <a href="index.php">LOGOUT</a>

                    </div>


                </nav>  
            </div>

        </center>
    </body>
</html>
