
<?php 
require_once("session.php");
require_once("function.php");
require_once("config.php");

if(isset($_POST['submit'])){
    $username=mysqli_real_escape_string($conn,htmlspecialchars($_POST['username'], ENT_QUOTES, 'utf-8'));
    $regno=mysqli_real_escape_string($conn,htmlspecialchars($_POST['regno'], ENT_QUOTES, 'utf-8'));
    define("checkbox", "checkbox");

    
    
  
    

    
    //student login validation 
    $error="";
    
    if(empty($username)&& empty($regno)){
        $_SESSION['EmptyField']="Sorry! You Did Not Provide Any Data.";
    }elseif(!CheckStdnt($username)){
        $_SESSION['ErrorUser']="";
    }elseif(!CheckStdnt_Reg($regno)){
        $_SESSION['ErrorReg']="";
    }
    else{
        global $conn;
        $sql="SELECT * FROM students WHERE username='$username' ";
        $query=mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)>0){
            $result=mysqli_fetch_array($query);
            $user=$result['username'];
            $name=$result['name'];
            $reg=$result['regno'];
             $id=$result['id'];
             $image=$result['image'];
             $cardserial=$result['cardserial'];
             
             if($user==$username && $reg==$regno){
                 $_SESSION['user']=$user;
                 $_SESSION['cardserial']=$cardserial;
                 $_SESSION['image']=$image;
                 global $conn;
                 $crypt=rand(200,90000);
                 $sql="UPDATE students SET  cardserial='$crypt' ";
                 $query=mysqli_query($conn,$sql);
                 if($query){
                     $image=$_SESSION['image'];
                     
                    $_SESSION['Index']="";
                    
                       header("refresh:3 url=dashboard.php");

                 }

             }
           
        }
    }
}



?>
<?php  require_once("header.php");  ?>
<?php  require_once("title.php");  ?>
<!-- section -->
<section class="register">
	<div class="register-full">
		<div class="register-right">
			<div class="register-in">
				<h1>Students Result Portal </h1>
				<p>Login With Your Username And Reg Number
                </p>
				<div class="register-form">
					<form action="index.php" method="post">
						<div class="fields-grid">
							<div class="styled-input agile-styled-input-top">
                            <?php echo Index()?>
                            <?php echo EmptyField(); ?>
                                <span></span>
                              
                            </div>
                          
							<div class="styled-input">
								<input type="text" name="username" > 
								<label>Username</label>
                                <span></span>
                                <?php echo ErrorUser(); ?>
                               
							</div> 
							
							<div class="styled-input">
								<input type="tel" name="regno" >
								<label>Reg Number</label>
                                <span></span>
                                <?php echo ErrorReg(); ?>
							</div>
						
						
							<div class="clear"> </div>
                             <label class="checkbox"><input type="checkbox" name="checkbox" checked><i></i>I agree to the <a href="terms.php">Terms and Conditions</a></label>
                            <?php echo AcceptTerms(); ?>
                        </div>
                       
                        <input type="submit"  value="Check Result" name="submit">

                    </form>
                   
				</div>
				<div class="registerimg">
					<img src="images/General3.jpg" alt="" />
				</div>
			<div class="clear"> </div>
		</div>
		</div>
	<div class="clear"> </div>
</div>
	<?php require_once("footer.php") ?>