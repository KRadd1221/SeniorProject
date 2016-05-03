<?php
include "_global.php";

    // fetch mysql table rows
    $sql = "select * from majorCourses";
    $result = mysqli_query($conn, $sql) or die("Selection Error " . mysqli_error($conn));
 $fp = fopen('MajorCourses.csv', 'w');

    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($fp, $row);
    }

    fclose($fp);






header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=MajorCourses.csv');
header('Pragma: no-cache');
readfile("MajorCourses.csv")
?>