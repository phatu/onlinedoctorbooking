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

       
    <center>
        <?php
        //page with database basics included
        include 'db.php';

        //starting session
        session_start();
        $sess_user = $_SESSION['sess_user'];

        //getting data from register table
        $query = $mysqli->query("SELECT * FROM register WHERE cell = '$sess_user'") or
                die($mysqli->error);
        $numrows = $query->fetch_array();
        $fname = $numrows['fname'];
        $cell = $numrows['cell'];


        //user name and appointments displayed
        echo 'Good day ' . $fname;


        $sql = "SELECT * FROM book WHERE cell='$sess_user'";
        if ($result = mysqli_query($mysqli,$sql)) {
            $rowcount = mysqli_num_rows($result);
        }

         if($rowcount == 0) {  
             ?>
             
            <h2>Your appointments will be displayed here</h2>
                     
          <?php
          
         } else {
             
        ?>

        <br/>

        <h2>HERE ARE YOUR APPOINTMENTS</h2>
        <br/>

        <!-- form that displays patient bookings -->
        <form method='POST' action='cancelAppointment.php'>
            <table align="center" id="show">
                <tr>              
                    <th>DATE AND TIME</th>
                    <th>REASON</th>
                    <th>RESCHEDULE APPOINTMENT</th>
                    <th style="padding-left: 20px">DELETE APPOINTMENT</th>
                </tr>

                <?php
                
                
         $result = $mysqli->query("SELECT * FROM book WHERE cell='$sess_user'") or die($mysql->error);

                while ($display = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td height=34px> <?php echo $display['dateAndTime']; ?> </td>
                        <td> <?php echo $display['reason']; ?> </td>    
                        
                        
                        <?php 
                        

                            if (time() <= strtotime($display['dateAndTime'])) 
                        {

                        
                                echo "<td><a href='reschedule.php?dateAndTime={$display['dateAndTime']}'>"; ?>RESCHEDULE</td></a>
                        
                        
                     <?php   } else { 
                        
                        ?>
                        
                        <td>RESCHEDULE</td>

                      <?php  }  
                      
                         if (time() <= strtotime($display['dateAndTime'])) {
                           ?>
                        
                        <td><?php echo "<a href='cancelAppointment.php?dateAndTime={$display['dateAndTime']}'>"; ?>DELETE</a></td>

                        <?php
                         } else {
                             
                             ?>
                                                <td>DELETE</td>
                          
                                                <?PHP
                         }
                    endwhile;
                    ?>
                </tr>  					
            </table>
        </form>
 <?php } ?> 



        <div class="container fixed-bottom">
            <nav class="navbar navbar-dark bg-dark">


                <div class="btn-group dropup">
                    <a href="appointment.php">BOOK APPOINTMENT</a>


                </div>

                <div class="btn-group dropup">
                    <a href="index.php">LOGOUT</a>

                </div>


            </nav>  
        </div>





   

    </body>
</html>



