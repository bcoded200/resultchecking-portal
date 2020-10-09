<?php  require_once('../header.php'); 
            require_once("../session.php");
             require_once("../function.php"); 
             require_once("../config.php");
             CheckAdmin();
if(isset($_POST['submit'])){
   $exampin=mysqli_real_escape_string($conn, htmlspecialchars($_POST['exampin'], ENT_QUOTES, 'utf-8'));
   if(empty($exampin)){
          $_SESSION['AdminExamPin']="Field Cannot Be Empty.";
   }elseif(!$exampin > 1 || $exampin > 100) {
      $_SESSION['AdminExamPinG']="Pin Must Be Greater Than 1 And Must Not Exceed 100!";
   }else{
                    $startdate = date('Y-m-d H:i:s');
                    $offset = strtotime("+1 day");
                    $enddate = date("Y-m-d H:i:s", $offset);
                    $rand_pin=rand(100000,500000);
                    
             global $conn;
         $sql="INSERT INTO generated_pin (pin,date_gen,date_expired,status)VALUES('$rand_pin', '$startdate', '$enddate', 'open')";
         $query=mysqli_query($conn, $sql);
         if($query){
          $_SESSION['AdminS']="Pin Generated Successfully.  Count Down Started To Expiry Date: \r\n $enddate";
            header("refresh:5 url= ../admin/generatepin.php");
    
         }
       


   }
}

?>



<div class="center">
<div class="container">
<div class="jumbotron">
                                                             
<form method="post" action="generatepin.php">
<?php echo AdminExamPin(); 
            echo AdminExamPinG();
            echo AdminS();


?>
<div class="form-row">
    <div class="col">
      <input type="text" class="form-control" name="exampin" placeholder="Enter No Of Pins To Generate">
      <h6><span style="font-family:Times;color:red;">This Form Accepts Only Integers</span></h6>
  <br />
    <input type="submit" name="submit" class="btn btn-success"  value="Generate Pin" />
    <br /><br />
    </div>
    
</form>

<?Php  

global $conn;
$sql="SELECT * FROM generated_pin ORDER BY id DESC";
$query=mysqli_query($conn,$sql);
?>


<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Pins</th>
      <th scope="col">Expiry</th>
      
      <th scope="col">Status</th>
    </tr>
  </thead>
  
    <?php 
    
    if(mysqli_num_rows($query)>0){
while($result=mysqli_fetch_array($query)){
    $id=$result['id'];
    $pins=$result['pin'];
    $expiry=$result['date_expired'];
    $active=$result['status'];
    $_SESSION['id']=$id;
   ?> <tbody>
    <tr>
  
    <tr>
    <?php
 $rg=rand(1,50);
   ?> <th scope="row"><?php echo $rg; ?></th>
    <td><?php echo $pins  ?></td>
    <td><?php echo $expiry ?></td><?php

?><?php  if($active== 'open'){
    echo "<td class='btn btn-success'>Open</td>";
}else{

echo  "echo <td class='btn btn-danger'>Closed</td>";
} 
?>

<td class='btn btn-danger'>
<a href="delete.php?delete=<?php echo $id ?>">Delete</a>
</td>
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
<?php require_once("../footer.php"); ?>