


<?php require_once("session.php"); ?>
<?php  require_once("function.php");  ?>
<?php  require_once("config.php");  
CheckStdnt_Log();

$user= $_SESSION['user'];
$serial=$_SESSION['cardserial'];

if(isset($_POST['submit'])){
    $serialno=$_POST['serialno'];
    $pin=$_POST['pin'];
    $examyear=$_POST['examyear'];
    $examsemester=$_POST['examsemester'];
    $name=$_POST['name'];

    if(empty($serialno)&&empty($pin)&&empty($examyear)&&empty($examsemester)&&empty($name)){
        echo "Fields cannot be empty";
    }elseif(ValidateUsedBy($name)){
        echo "<div class='alert alert-danger'>This Card has been used by another student , Expired Or The Pin Is Incorrect.</div>";
    }elseif(ValidateExpiredPin($pin)){
        echo "<div class='alert alert-danger'>This Pin Has Expired. Kindly Purchase A New Card</div>";
    }elseif(ValidateCorrectPin($pin)){
        echo "<div class='alert alert-danger'>This Pin Is Not Correct! You Have 4 Trials Left</div>";
    }else{
        global $conn;
        $sql1="UPDATE generated_pin SET status='close' LIMIT 1";
        $query1=mysqli_query($conn,$sql1);
        $sql4="UPDATE generated_pin SET usedby='$name' LIMIT 1";
        $query4=mysqli_query($conn,$sql4);
        $sql2="UPDATE students SET exam_pin='$pin' LIMIT 1";
        $query2=mysqli_query($conn,$sql2);

        $sql3="INSERT INTO pins(pin_code,usedby)VALUES('$pin','$name') ";
        $query3=mysqli_query($conn,$sql3);

        echo "<div class='alert alert-success'>Result Fetched. Kindly Check Your Email For Your Printout.</div>";
    }


  
            
    

}


  /*global $conn;
    $sql="SELECT * FROM students";
    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
     $result=mysqli_fetch_array($query);
     if($result){
$cardserial=$result['cardserial'];
if($serialno === $cardserial){
    echo "True";
}else{
    echo "false";
}
}
     }*/
?>



<?php  require_once("header.php");  ?>
<?php  require_once("title.php");  ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <p class="welcome ">Welcome <?php  echo $user; ?></p>
<h3 class="text-center header">Please Complete The Form Below To Check Ur Result</h3>

<div class="jumbotron">
<form action="dashboard.php" method="post">
<?php 
require_once("config.php");
global $conn;
$query="SELECT * FROM level ORDER BY level_numeric ";
$inject=mysqli_query($conn, $query);

$que="SELECT * FROM year ORDER BY id";
$inj=mysqli_query($conn, $que);
?>
    <div class="form-group">
        <label for="serialno">Enter Card Serial No</label>
        <input type="text" id="serialno" name="serialno" class="form-control">

        <div class="form-group">
        <label for="pin">Enter Exam Pin</label>
        <input type="text" id="pin" name="pin" class="form-control">


        <div class="form-group">
        <label for="exam Year">Examination Year</label>
        <select name="examyear" id ="exam year">
        <option value="">Select Year</option> 
        <?php 
        if(mysqli_num_rows($inj)>0){
            while($res=mysqli_fetch_array($inj)){
                echo ' <option value=" '.$res['id'].' ">'.$res['year'].'</option>';
            }
        }
        ?>
           
           
</option>
</select>
</div>

<div class="form-group">
        <label for="exam Year">Examination Level</label>
        <select name="examsemester" id ="exam semester">
        <option value="">Select Level</option> 
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

<label for="name">Student Name</label>
        <div class="form-group">
        <label for="name">Enter Your Registered Name</label>
        <input type="text" id="serialno" name="name" class="form-control"/>
        </div>
</div>
<input type="submit" value="Check Result" name="submit" class="btn btn-success" /> 
</form><br /><br />
<button type="button" class="btn btn-warning">Your Serial Number:  <?php  echo $serial; ?></button>

</div>
</div>
</div>

<div class="col-md-4">
    <p class="welcome">Please Note</p>
    <ul class="list-group" style="padding:42px; font-size:19px;">
    <li class=" list-group-item list-group-item-success">You Have To Purchase A Scratch Card From The School</li>
    <li class=" list-group-item list-group-item-danger">Do Not Share Your RegNo With Anybody Always Check For Expiry Date.</li>
</ul>


<ul class="nav nav-pills flex-column">
<li class="nav-item">
<a class="nav-link active" href="dashboard.php">Dashboard</a>
</li>
<li class="nav-item">
<a class="nav-link" href="logout.php">Logout</a>
</li>
<li class="nav-item">
<a class="nav-link" href="profile.php">Update Profile</a>
</li>
<li class="nav-item">
<a class="nav-link" href="delete_p.php">Delete Profile</a>
</li>
</ul>

</div>



</div>
</div>
</div>
</div>

<?php require_once("footer.php") ?>