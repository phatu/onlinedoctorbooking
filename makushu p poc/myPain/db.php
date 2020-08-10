<?php

	//database basics needed to run the database
    $dbhost = "localhost";
    $dbname = "root";
    $password = "";
    $db = "mypain";

    // $dbhabndle = mysql_connect($dbhost, $dbname, $password) or die("could not connect to database");

    // mysql_select_db($db, $dbhabndle) or die("can not select database");

    
        $mysqli = new mysqli($dbhost, $dbname, $password, $db) or die(mysqli_error($mysqli));

?>


