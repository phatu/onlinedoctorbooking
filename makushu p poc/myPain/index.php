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
        
        
        <?php
			//page with database basics included
            include 'db.php';

			//getting data from the registration form
            while(isset($_POST["register"])){
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $cell = $_POST["cell"];
                $password = $_POST["password"];
                
                  
				  //validating user input
                    if (!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)) {
                       echo "<script>alert('Only letters are allowed for first name and last name')</script>";
                       break;
                    } else if (!preg_match("/^[0][1-9]\d{8}$/", $cell)){
                        echo "<script>alert('Please enter a unique, valid cell number of digits only')</script>";
                        break;
                    } 
                    else if (!preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $password)){
                        echo "<script>alert('Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit')</script>";
                        break;
                    } else {
                        
						
						//inserting into register database if user input is correct
                    $sql = "INSERT INTO register(fname, lname, cell, password) VALUES('$fname','$lname', '$cell', '$password')";
                        $result = mysql_query($sql);
                    
                        if($result){
                            echo "<script>alert('You have been registered. You may now LOGIN ');window.location='index.php';</script>";    
                        }else{
                            echo "<script>alert('Failed to register, please try again ');window.location='index.php';</script>"; 
                        }
                    }
                
            }

           
            
			//getting data from the login form
            if(isset($_POST["login"])){
                $celln = $_POST["celln"];
                $password1 = $_POST["password1"];

				//checking if cell number and password are registered
                $query = mysql_query("SELECT * FROM register WHERE cell='".$celln."' AND password='" .$password1."'");
                $numrows=  mysql_num_rows($query);

                if($numrows!=0){
                    while($row=  mysql_fetch_assoc($query)){
                        $dbcell = $row['cell'];
                        $dbpassword=$row['password'];
                    }

					//setting cookies and session
                    if($celln == $dbcell && $password1==$dbpassword){ 
                        session_start();
                        $_SESSION['sess_user'] = $celln;

                        $seconds = 300 + time();
                        setcookie(loggedin, date('F jS g:i a'), $seconds);
                        header("Location:details.php");
                     }   
                } else {
                    echo 'invalid cell number or password';    
                }
            }
        
        ?>
				<!--logo and slogan-->
                    <table align="center">
                        <tr>
                            <td><img src="logo.jpg" width="200" height="200px"></td>
                            <td><h1>YOUR PAIN IS MY PAIN TO FIX</h1></td>
                        </tr>
                    </table>
					
		<!--user registration form-->
        <form action="" method="POST">
            <table id="reg" align="center">
                <tr>
                    <td><label><b>REGISTRATION</b></label></td>
                </tr>
                <tr>
                    <td>FIRST NAME</td>
                    <td><input type="text" name="fname" title="Please fill in your first name" required></td>
                </tr>
                <tr>
                    <td>LAST NAME</td>
                    <td><input type="text" name="lname" title="Please fill in your last name" required></td>
                </tr>
                <tr>
                    <td>CELL NUMBER</td>
                    <td><input type="tel" name="cell" maxlength="10" title="Please fill in your cell number" required></td>
                </tr>
                <tr>
                    <td>PASSWORD</td>
                    <td><input type="password" name="password" title="Please fill in your password" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="REGISTER" name="register" title="Click To Register"></td>
                </tr>
            </table>
        </form>
    <br/>
	
			<!--user registration form-->
        <form action="" method="POST">
            <table id="log" align="center">
                <tr>
                    <td><label><b>LOGIN</b></label></td>
                </tr>

                <tr>
                    <td>CELL NUMBER</td>
                    <td><input type="tel" name="celln" maxlength="10" title="Please fill in your registered cell number" required></td>
                </tr>

                <tr>
                    <td>PASSWORD</td>
                    <td><input type="password" name="password1" title="Please fill in your rgistered password" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="LOGIN" name="login" title="Click To Login"></td>
                </tr>
            </table>
        </form>
    <center><h3>Designed by Phatutshedzo Makushu</h3></center>
    </body>
</html>
