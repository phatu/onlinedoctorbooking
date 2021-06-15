<?php

	//database basics needed to run the database
    $dbhost = "localhost";
    $dbname = "root";
    $password = "";
    $db = "mypain";

    
        $mysqli = new mysqli($dbhost, $dbname, $password, $db) or die(mysqli_error($mysqli));



        // patient registration
        //getting data from the registration form
        if (isset($_POST["register"])) {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $cell = $_POST["cell"];
            $password = $_POST["password"];


            //validating user input
            if (!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)) {
                echo "<script>alert('Only letters are allowed for first name and last name');window.location='index.php';</script>";
            } else if (!preg_match("/^[0][1-9]\d{8}$/", $cell)) {
                echo "<script>alert('Please enter a unique, valid cell number of digits only');window.location='index.php';</script>";
            } else if (!preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $password)) {
                echo "<script>alert('Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit');window.location='index.php';</script>";
            } else {


                $mysqli->query("INSERT INTO register(fname, lname, cell, password) VALUES('$fname','$lname', '$cell', '$password')") or
                        die($mysqli->error);


                 if ($mysqli) {

                echo "<script>alert('You have been registered. You may now LOGIN ');window.location='index.php';</script>";
                    } else {
                        echo "<script>alert('Your appointment has not been rescheduled. Please try again.');window.location='index.php';</script>";
                    }
            }
        }

        
        //patient login
        //getting data from the login form
        if (isset($_POST["login"])) {
            $celln = $_POST["celln"];
            $password1 = $_POST["password1"];

            //checking if cell number and password are registered
            $query = $mysqli->query("SELECT * FROM register WHERE cell='$celln' AND password='$password1'") or
                    die($mysqli->error);



            $numrows = $query->fetch_array();
            $dbcell = $numrows['cell'];
            $dbpassword = $numrows['password'];

            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $dbcell = $numrows['cell'];
                    $dbpassword = $numrows['password'];
                }


                //setting cookies and session
                if ($celln == $dbcell && $password1 == $dbpassword) {
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
        
        
        //doctor login
        //getting data from the login form
        if (isset($_POST["loginDoctor"])) {
            $number = $_POST["number"];
            $password = $_POST["password"];

            //checking if cell number and password are registered
            $query = $mysqli->query("SELECT * FROM employee WHERE number='$number' AND password='$password'") or
                    die($mysqli->error);



            $numrows = $query->fetch_array();
            $dbNumber = $numrows['number'];
            $dbPassword = $numrows['password'];

            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $dbNumber = $numrows['number'];
                    $dbPassword = $numrows['password'];
                }


                //setting cookies and session
                if ($number == $dbNumber && $password == $dbPassword) {
                    session_start();
                    $_SESSION['sess_user'] = $number;

                    $seconds = 300 + time();
                    setcookie(loggedin, date('F jS g:i a'), $seconds);
                    header("Location:doctor.php");
                }
            } else {
                echo 'invalid cell number or password';
            }
        }
        
        
        