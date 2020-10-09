<?php
//db connection details
$db_host="localhost";
$db_user="root";
$db_pass="123456";
$db_name="portal";

//connection querry
$conn=mysqli_connect("$db_host","$db_user","$db_pass","$db_name") or die("could not connect".mysqli_error($conn));





?>