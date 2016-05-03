<?php
$host = "localhost"; 
$user = "kradd1221";
$pass = ""; 
$db = "majorCourses"; 
$con = mysql_connect($host, $user, $pass);
if (!$con) {
    echo "Could not connect to server\n";
    die(mysql_error());
}

$con1 = mysql_select_db($db);

if (!$con1) {
    echo "Cannot select database\n";
    die(mysql_error()); 
}


        mysql_query("TRUNCATE TABLE majorCourses");
        $sql = "
        LOAD DATA LOCAL INFILE 'uploads/file.csv'
        INTO TABLE majorCourses
        FIELDS TERMINATED BY ','
        ENCLOSED BY '\"'
        LINES TERMINATED BY '\n'
        IGNORE 1 LINES";
        
        $query = mysql_query($sql);
        
        if($query){
            header("location: index.php");
        }
        else{
            echo die(mysql_error());
        }
        $sql="update majorCourses SET SCIENCE_II = TRIM(TRAILING '\n' FROM title)";
     $query = mysql_query($sql);
        
        if($query){
            header("location: index.php");
        }
        else{
            echo die(mysql_error());
        }


    // fetch mysql table rows
  





?>