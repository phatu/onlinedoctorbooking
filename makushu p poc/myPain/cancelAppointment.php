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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        
        
    </head>
    <body>
        <?php
        //session starts
        session_start();
        $sess_user = $_SESSION['sess_user'];

        //page with database basics included
        include 'db.php';
        ?>

    <center>
        <h1>DELETE YOUR APPOINTMENT</h1>

                <?php
                $dateAndTime = $_GET['dateAndTime'];
                $result = $mysqli->query("SELECT * from book where dateAndTime='$dateAndTime'") or
                        die($mysqli->error);

                $row = $result->fetch_array();
                $dateAndTime = $row['dateAndTime'];
                $reason = $row['reason'];
                ?>
                <!--reschedule form for user -->	 
                    <form action="" method="POST">

                         <h3>Reason</h3>
                            <label><?php echo $reason ?></label><br/><br/>
                        
                            
                            <h3>Date and time</h3>
                                <label name="dateAndTime"><?php echo $dateAndTime;   ?></label><br/><br/>
                            

                            
                            

                            <p class="button-style"><input type="submit" title="Click To Delete"  name="delete" value="DELETE" align="center" class="btn btn-dark"/></p>

                    </form>

                  

                    <?php
                    if (isset($_POST['delete'])) {



                           $mysqli->query("DELETE FROM book WHERE dateAndTime='$dateAndTime'") or
                die($mysqli->error);

                        if ($mysqli) {

                            echo "<script>alert('Your appointment has been successfully deleted.');window.location='details.php';</script>";
                        } else {
                           echo "<script>alert('Your appointment has not been deleted. Please try again.');window.location='details.php';</script>";
                        }
                    }
                    ?>





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
</html
