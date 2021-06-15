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
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #212529;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}


</style>
</head>


    <body>


            <?php
            //page with database basics included
            include 'db.php';

            //starting session
            session_start();
            $sess_user = $_SESSION['sess_user'];
            ?>           
            <!-- table that displays patient bookings -->
            <table align="center" id="show">
                <tr>    
                    <th>DATE AND TIME</th>
                    <th>REASON FOR APPOINTMENT</th>
                    <th>PATIENT</th>
                    <th>SEEN</th>
                    <th style="padding-right: 40px">DIAGNOSIS</th>
                    <th style="padding-right: 40px">FILES</th>
                </tr>

                <?php
                $result = $mysqli->query("SELECT * FROM book ORDER BY id DESC") or die($mysql->error);
                 
            
                while ($display = $result->fetch_assoc()):
                    $dateTimeDisplay = $display['dateAndTime'];
                    $reason = $display['reason'];
                    ?>
                    <tr>
                            <td> <?php echo $dateTimeDisplay; ?> </td>
                        <td> <?php echo $display['reason']; ?> </td>
                        <td> <?php echo $display['name']; ?> </td>  
                        <td>
                        <label class="switch">
                          <input type="checkbox">
                          <span class="slider"></span>
                        </label>
                     </td>                  

                     <td> <?php echo "<a href='files.php?dateAndTime={$display['dateAndTime']}'>"; ?>WRITE</a></td>
                     
                     <td> <?php echo "<a href='viewPatient.php?dateAndTime={$display['dateAndTime']}'>"; ?>VIEW</a></td>

                    <?php
                        
                    endwhile;
                    ?>
                </tr>  					
            </table>
        
        
        <div class="container fixed-bottom">
            <nav class="navbar navbar-dark bg-dark">
                <div class="btn-group dropup">
                    <a href="index.php">LOGOUT</a>
                </div>
            </nav>  
        </div>

    </body>
</html>