<!DOCTYPE html>
<html>
    <head>
        <title>Dr MYPAIN</title>
        <meta charset="UTF-8">
        <meta name="description" content="Dr Mypain online booking">
        <meta name="author" content="Phatutshedzo Makushu">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="theCss.css">



        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>

</head>

<body>
    <?php
        //page with database basics included
        include 'db.php';

        //starting session
        session_start();
        $sess_user = $_SESSION['sess_user'];

        //getting data from book table 
        $query = $mysqli->query("SELECT * FROM book WHERE cell = '$sess_user' ORDER BY id DESC LIMIT 1") or
                die($mysqli->error);
        $numrows = $query->fetch_array();
        $reason = $numrows['reason'];
        $startDateAndTime = $numrows['dateAndTime'];
        $endDateAndTime = date( "l jS F Y H:i", strtotime($startDateAndTime)+(60*30) );

        
        

       
?>
    
<center>
	<div id="wrapper">
		<h1>SAVE YOUR APPOINTMENT</h1>
		<div title="Add to Calendar" class="addeventatc">
			Add to Calendar
			<span class="start"><?php echo $startDateAndTime; ?></span>
			<span class="end"><?php echo $endDateAndTime; ?></span>
			<span class="timezone">Africa/Johannesburg</span>
			<span class="title"><?php echo $reason; ?></span>
			<span class="description">Your appointment with Doctor Fix It</span>
			<span class="location">Carlton Centre</span>
			<span class="organizer">Phatutshedzo Makushu</span>
			<span class="organizer_email">phatumakushu@gmail.com</span>
			<span class="all_day_event">false</span>
		</div>
	</div>
    
               


            
            
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