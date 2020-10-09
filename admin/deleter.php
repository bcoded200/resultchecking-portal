<?php
require_once("../config.php");
require_once("../session.php");
require_once("../function.php");
if(isset($_GET['delete'])){
$query=mysqli_query($conn, "DELETE FROM report WHERE id=' ".mysqli_real_escape_string($conn,$_GET['delete'])." ' ");
if($query){
    ?>
    <script>
alert("Result Deleted Successfully!");

    </script>
    
    <?php
    header("location: ../admin/view.php");
}else{
    ?>
    <script>
alert("Result Deleted Successfully!");

    </script>
    
    <?php
}

}





?>