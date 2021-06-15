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
        
        
    <style>
       
 
        textarea {
            font-size: 20px;
            width: 100%;
        }
    </style>
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

        <table align="center">
            <?php
            $dateAndTime = $_GET['dateAndTime'];
            $result = $mysqli->query("SELECT * from book where dateAndTime='$dateAndTime'") or
                    die($mysqli->error);

            $row = $result->fetch_array();
            $dateAndTime = $row['dateAndTime'];
            $reason = $row['reason'];
            $name = $row['name'];
            ?>
            <center>
                <form action="" method="POST">
                                <h1><?php  echo $name; ?>'s diagnosis</h1>
                        
                            
                            Date : <label name="oldDateAndTime"><?php echo $dateAndTime; ?></label><br/>
                            Reason : <label name="reason"><?php echo $reason; ?></label>

                        

                        <textarea name="diagnosis" cols="30" rows="14"></textarea>
                                         <table align="center">

                        <tr><td colspan="2" align="center"><p class="button-style"><input type="submit" title="Click To Save"  name="saveDiagnosis" value="Save Diagnosis" align="center"/></p></td></tr>
                        
            
                    <?php 
                    
                     
                if (isset($_POST['saveDiagnosis'])) {
                    $diagnosis = $_POST['diagnosis'];

                    $mysqli->query("UPDATE book SET diagnosis='$diagnosis' WHERE dateAndTime='$dateAndTime'") or
                            die($mysqli->error);

                    if ($mysqli) {

                        echo "<script>alert('Diagnosis has been successfully saved.');window.location='doctor.php';</script>";
                    } else {
                        echo "<script>alert('Diagnosis has not been saved. Please try again.');window.location='doctor.php';</script>";
                    }
                }
                
                    
                    
                  ?>
                    </table>
                </form>


               
                </body>
                </html>

                <?php
                if (isset($_POST['reschedule'])) {
                    $newDateAndTime = $_POST['newDateAndTime'];

                    $mysqli->query("UPDATE book SET dateAndTime='$newDateAndTime' WHERE dateAndTime='$oldDateAndTime'") or
                            die($mysqli->error);

                    if ($mysqli) {

                        echo "<script>alert('Your appointment has been successfully rescheduled.');window.location='details.php';</script>";
                    } else {
                        echo "<script>alert('Your appointment has not been rescheduled. Please try again.');window.location='details.php';</script>";
                    }
                }
                ?>





                <div class="container fixed-bottom">
                    <nav class="navbar navbar-dark bg-dark">


                        <div class="btn-group dropup">
                            <a href="doctor.php">BACK TO PATIENTS</a>


                        </div>

                        <div class="btn-group dropup">
                            <a href="index.php">LOGOUT</a>

                        </div>


                    </nav>  
                </div>
         </center>
    </body>
</html>