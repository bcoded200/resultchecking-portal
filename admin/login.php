<?php   require_once("../header.php"); ?>



<?php require_once("../session.php"); ?>
<?php  require_once("../function.php");  ?>
<?php  require_once("../config.php");  

if(isset($_POST['submit'])){
    $email=mysqli_real_escape_string($conn, htmlspecialchars($_POST['email'], ENT_QUOTES, 'utf-8' ));
    $password=$_POST['password'];

    if(empty($email) || empty($email)){
        $_SESSION['AdminEmptyError']=" Email And Password Is Required. Please Recheck The Form Fields ";
    }else{
        global $conn;
    $sql="SELECT * FROM admin WHERE email='$email' ";
    $query=mysqli_query($conn,$sql);
    if($admin=mysqli_fetch_array($query)){
        $adminp=$admin['password'];
        $email=$admin['email'];
        $username=$admin['username'];
        $avatar=$admin['avatar'];
        if(CheCkHaSh($password, $adminp)){
            $_SESSION['user']=$username;
            $_SESSION['email']=$email;
            $email=$_SESSION['email'];
            
            $_SESSION['AdminPassLenghtError']="\r\n\r\n Welcome $username\r\n  ";
           
            header("refresh:4  url=../admin/home.php");  
        }
                         
        }else{
            $_SESSION['AdminLoginError']="Either Your Username Or Password Is Incorrect.";
        }
       
        }
    }





?>
<section class="register">
	<div class="register-full">
		<div class="register-right">
			<div class="register-in">
				<h1>Admin Login </h1>
				<p>Login With Your Email And Password
                </p>
               
				<div class="register-form">
                <center><img src='../admin/images/<?php if ($avatar ) {echo $avatar; }else{echo "No Image Found For Your Account "; }?>' width='60px' height='60px' border-radius='8px' /></center>
					<form action="login.php" method="post">
						<div class="fields-grid">
							<div class="styled-input agile-styled-input-top">
                            <?php   echo  AdminEmptyError(); 
                                         echo AdminPassLenghtError();
                                          echo AdminLoginError();
                                        
                             ?>
                            <?php   //     ?>
                                <span></span>
                              
                            </div>
                          
							<div class="styled-input">
								<input type="text" email="email" name="email"> 
								<label>Email Address</label>
                                <span></span>
                                <?php     ?>
                               
							</div> 
							
							<div class="styled-input">
								<input type="tel" name="password" >
								<label>Password</label>
                                <span></span>
                                <?php        ?>
							</div>
						
						
							<div class="clear"> </div>
                             
                            <?php      ?>
                        </div>
                       
                        <input type="submit"  value="Login Now!" name="submit">

                    </form>
                   
				</div>
				<div class="registerimg">
					<img src="images/adm-req.png" alt="adm-req" />
				</div>
			<div class="clear"> </div>
		</div>
		</div>
	<div class="clear"> </div>
</div>
<script>
if(windows.history.replacestate){
    windows.history.replacestate(null, null, .windows.href);
}
</script>
  <?php   require_once("../footer.php");  ?>