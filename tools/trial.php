<?php 

require_once("../header.php");
require_once("../title.php");

?>


if(isset($_GET['delete'])){
    $result=mysqli_query($conn, "DELETE FROM generated_pin WHERE id='".mysqli_real_escape_string($conn, $_GET['delete']). "'");
    if($result){
        echo "success";
    }else{
        echo "GET NOT SET";
    }

}






<?php





require_once("../footer.php");



         /*$startdate = date('Y-m-d H:i:s');
         $offset = strtotime("+1 day");
         $enddate = date("Y-m-d H:i:s", $offset);
         

//file code

/*else{
    global $conn;
    $sqli="INSERT INTO report (level_id, report_card, student_name, exam_year, exam_semester)VALUES('1','report.pdf','$student_name','$exam_year','$exam_semester')";
    $qli=mysqli_query($conn,$sqli);
    if($qli){
        echo "<div class='alert alert-success'>YOUR DETAIL WAS UPLOADED:\r\n\r\n </div>";
    }else{
        echo "<div class='alert alert-danger'>SOMETHING IS WRONG WITH YOUR UPLOADED:</div>";
    }

 }     

if(isset($_POST['submit'])){
    $name       = $_FILES['file']['name'];  
    $temp_name  = $_FILES['file']['tmp_name'];  
    if(isset($name) and !empty($name)){
        $location = 'images/uploads/';      
        if(move_uploaded_file($temp_name, $location.$name)){
            echo "<div class='alert alert-success'>YOUR DETAIL WAS UPLOADED:\r\n\r\n $temp_name</div>";
        }
    } else {
        echo 'You should select a file to upload !!';
    }
}
*/
?>