<?php
require_once("../header.php");
require_once("../function.php");
require_once("../session.php");
require_once("../config.php");
/*
if(isset($_GET['delete'])){
    $id=mysqli_real_escape_string($conn,$_GET['delete']);
    $result="DELETE FROM generated_pin WHERE id='$id' ";
    if($result){
        //echo "success";
        ?>
        <script>
alert("Action Was Successfull");
        </script>
        <?php
        header("refresh:2 url= ../admin/generatepin.php");
    }else{
        echo "GET NOT SET";
    }

}
*/


if(isset($_GET['delete'])){
    $result=mysqli_query($conn, "DELETE FROM generated_pin WHERE id=' ".mysqli_real_escape_string($conn, $_GET['delete']). " ' ");
    if($result){
 
        ?>
        <script>
alert("Action Was Successfull");
        </script>
        <?php
        header("location: ../admin/generatepin.php");
    }else{
        echo "GET NOT SET";
    }

}






require_once("../footer.php");
?>