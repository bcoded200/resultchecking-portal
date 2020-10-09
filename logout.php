
<?php require_once("session.php"); ?>
<?php  require_once("function.php");  ?>
<?php  require_once("config.php");  

$_SESSION['user']=null;
session_destroy();
header("location: index.php");
$_SESSION['ErrorNotLoggedin']="Logged Out Successfully";


?>




