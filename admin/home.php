
<?php require_once("../session.php"); ?>
<?php  require_once("../function.php");  ?>
<?php  require_once("../config.php");  


CheckAdmin();
if(isset($_POST['submit'])){
$name =$_FILES['file']['name'];
$tmp_name= $_FILES['file']['tmp_name'];
$size = $_FILES['file']['size'];

$fname=explode(".", $name);
$fend=end($fname);
$flower=strtolower($fend);
$frand=date('y-m-t h:i-s').'.'.$flower;







    $exam_year =$_POST['exam_year'];
    $exam_semester=$_POST['exam_semester'];
    $student_name=$_POST['student_name'];
    
  
if(empty($exam_year)&&empty($exam_semester)){
$_SESSION['AdminFieldError']="Exam Year Or Semester Is Empty";
}elseif (empty($student_name)){
    $_SESSION['AdminStdntName']="Sorry, Student (NAME) Field Was Omitted";
}else{
if($flower !== 'pdf' && $flower !== 'png' ){
    $_SESSION['AdminStdntUploadPdf']="Either The File Format Is Not Supported , Or You Did Not Select Any File. Supported File Types  Are (PDF, JPG)";
} else{
if(isset($frand) and !empty($frand)){
    $name=rand(100,1000).'.'.$flower;
    $location = 'images/uploads/';      
    if(move_uploaded_file($tmp_name, $location.$name)){
    if(AdminCheckUploaded($exam_year,$exam_semester,$student_name)){
        $_SESSION['AdminStdntUploadFailed']="$student_name,\r\n Alerady Has  $exam_semester \r\n Result For \r\n $exam_year\r\n !";
    }else{
        global $conn;
        $sql="INSERT INTO report(report_card,student_name,exam_year,exam_semester)VALUES( '$name','$student_name','$exam_year','$exam_semester')";
         $query=mysqli_query($conn,$sql);
         if($query){

            $_SESSION['AdminStdntUploadPdf']="$student_name,\r\n Result For \r\n $exam_year ,  \r\n  $exam_semester \r\nWas Uploaded Sucessfully!";
            
         }
    }
        
    } 
}

}
}
    
 
    
    
}  



   
?>



<?php require_once("../header.php"); ?>
<?php  require_once("../title.php");  ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <p class="welcome ">Welcome <?php  echo $_SESSION['user']; ?></p>
<h3 class="text-center header">Admin PAnel</h3>

<div class="jumbotron">
<form action="home.php" method="post" enctype="multipart/form-data">
<?php 
require_once("../function.php");

echo AdminFieldError();
echo AdminStdntName();
echo AdminStdntUploadPdf();
echo AdminStdntUploadFailed();

//admin upload students result section starts here
$que="SELECT * FROM year ORDER BY id";
$inj=mysqli_query($conn, $que);

$query="SELECT * FROM level ORDER BY level_numeric ";
$inject=mysqli_query($conn, $query);

$std="SELECT * FROM students ORDER BY id";
$sq=mysqli_query($conn,$std);
?>
    


        <div class="form-group">
        <label for="exam Year">Exam Year</label>
        <select name="exam_year" id ="exam year">
        <option value="">Select Year</option> 
        <?php 
        if(mysqli_num_rows($inj)>0){
            while($res=mysqli_fetch_array($inj)){
                $year=$res['year'];
                echo "<option value=".$year."> $year</option>";
                //echo ' <option value=" '.$res['year'].' ">'.$res['year'].'</option>';
            }
        }
        
        ?>
           
           
</option>
</select>
</div>

<div class="form-group">
        <label for="exam Year">Stdnt Level</label>
        <select name="exam_semester" id ="exam semester">
        <option value="">Select level</option> 
        <?php  
        if(mysqli_num_rows($inject)>0){
            while($result=mysqli_fetch_array($inject)){

                echo '<option value=" '.$result['level'].' "> '.$result['level'].'</option>';
            }
        }
        
        ?>
            
         
</option>
</select>
</div>

<div class="form-group">

        <label for="student name">Stdnt Name</label>
        <select name="student_name" id ="student name">
        <option value="">Select Name</option> 
        <?php  
        if(mysqli_num_rows($sq)>0){
            while($newsq=mysqli_fetch_array($sq)){

                echo '<option value=" '.$newsq['name'].' "> '.$newsq['name'].'</option>';
            }
        }
        
        ?>
  
         
</option>
</select><br />
<input type="file" name="file" class="btn" /><br /><br />
<input type="submit" name="submit" value="Upload Result" class="btn btn-success" / >
</form>

</div>
</div>




</div>


<div class="col-md-4">
    <p class="welcome">Please Note</p>
    <ul class="list-group" style="padding:42px; font-size:19px;">
   
</ul>


<ul class="nav nav-pills flex-column">
<li class="nav-item">
<a class="nav-link active" href="dashboard.php">Dashboard</a>
</li>
<li class="nav-item">
<a class="nav-link" href="logout.php">Logout</a>
</li>
<li class="nav-item">
<a class="nav-link" href="view.php">View Uploaded Result</a>
</li>
<li class="nav-item">
<a class="nav-link" href="generatepin.php">Generate Pin</a>
</li>
</ul>

</div>



</div>
</div>
</div>
</div>
 


<?php require_once("../footer.php"); ?>