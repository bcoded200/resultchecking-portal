<?php require_once("../session.php"); ?>
<?php  require_once("../function.php");  ?>
<?php  require_once("../config.php");  

$_SESSION['email']=null;
session_destroy();
header("location: ../admin/login.php");
$_SESSION['ErrorNotLoggedin']="Logged Out Successfully";


?>