<?php  require_once('../header.php'); 
            require_once("../session.php");
             require_once("../function.php"); 
             require_once("../config.php");


             CheckAdmin();









?>
<div class="center">
<div class="container">
<div class="jumbotron">
<?Php  

global $conn;
$sql="SELECT * FROM report ORDER BY id DESC";
$query=mysqli_query($conn,$sql);
?>


<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Uploaded Result</th>
      <th scope="col">Student Name</th>
      <th scope="col">Student Year</th>
      <th scope="col">Student Semester</th>
      <th scope="col">Admin Action</th>
      
     <!-- <th scope="col">Suspended</th>-->
    </tr>
  </thead>
  
    <?php 
    
    if(mysqli_num_rows($query)>0){
while($result=mysqli_fetch_array($query)){
    $report_card=$result['report_card'];
    $student_name=$result['student_name'];
    $exam_year=$result['exam_year'];
    $exam_semester=$result['exam_semester'];
    $id=$result['id'];
    $_SESSION['id']=$id;
   ?> <tbody>
    <tr>
  
    <tr>
    <?php

   ?> <th scope="row"><?php echo $report_card; ?></th>
    <td><?php echo $student_name  ?></td>
    <td><?php echo $exam_year ?></td>
     <td><?php echo $exam_semester ?></td>
     <?php
?>


<td class='btn btn-success'><a href="../admin/images/uploads/<?php echo $report_card ?>" target="_blank">View</a></td>
<td class='btn btn-danger'><a href="deleter.php?delete=<?php echo $id ?>">Delete</a>

<?php
?><?php

    }
    }    else{

        echo  "echo <center><td class='info info-success' style='color:red;font-family:Times;' '><center>You Have Not Generated Any Pin Yet</center></td></center>";
} 
    
    ?></tr><?php
    ?>

   
    
  </tbody>
</table>

</div>
</div>
</div>
<?php  require_once('../footer.php'); ?>