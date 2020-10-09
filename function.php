<?php
require_once("session.php");
require_once("config.php");

function redirect($newlocation){
    header("location".$newlocation);
    exit;
}


function CheckStdnt($username){
    global $conn;
    $sql="SELECT * FROM students WHERE username='$username'";
    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
return true;
    }else{
        return false;
    }
}

function CheckStdnt_Reg($regno){
    global $conn;
    $sql="SELECT * FROM students WHERE regno='$regno'";
    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
return true;
    }else{
        return false;
    }
}


function CheckAdmin(){
    if(!$_SESSION['user']){
        $_SESSION['ErrorNotLoggedin']="You Have To Login First.";
        header("location: ../admin/login.php");
 
    }
}


function CheckStdnt_Log(){
    if(!$_SESSION['user']){
        $_SESSION['ErrorNotLoggedin']="You Have To Login First.";
       header("location: index.php");
    }
}

function AdminCheckUploaded($exam_year,$exam_semester,$student_name){
    global $conn;
    $sql20="SELECT *  FROM report WHERE exam_year='$exam_year' && exam_semester='$exam_semester' &&student_name='$student_name' ";
    $query20=mysqli_query($conn,$sql20);
    if(mysqli_num_rows($query20)>0){
        $result20=mysqli_fetch_array($query20);
        $name1=$result20['student_name'];
        $syear=$result20['exam_year'];
        $semester=$result20['exam_semester'];
        if($name1 == $student_name && $syear == $exam_year && $semester == $exam_semester ){
            return true;
        }else{
            return false;
        }
    }

}

function encrypt($password){
    $BFormat="$2y$10$";
    $SaltLenght="32";
    $SaLt=generate_salt($SaltLenght);
    $CoN=$BFormat.$SaLt;
    $CrYpt=crypt($password,$CoN);
    return $CrYpt;
}
function Generate($SaltLenght){
    $UniQid=md5(uniqid(mt_rand(), true));
    $EnCode=base64_encode($UniQid);
    $Modify=str_replace("+",".", $EnCode);
    $SubStr=substr($Modify,0, $SaltLenght);
    return $SubStr;
}
function CheCkHaSh($password, $Chk){
    $RandCheCk=crypt($password,$Chk);
    if($RandCheCk === $Chk){
        return true;
    }else{
        return false;
    }
}
function AdminLoginAtempt($email,$password){
    global $conn;
    $sql="SELECT * FROM admin WHERE email='$email' ";
    $query=mysqli_query($conn,$sql);
    if($admin=mysqli_fetch_array($query)){
        $adminp=$admin['password'];
        if(CheCkHaSh($password, $adminp)){
return $admin;
        }else{
            return null;
        }
    }
}

function ValidateUsedBy($name){
    global $conn;
    $sql="SELECT *  FROM  generated_pin WHERE status='close' LIMIT 1";
    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
$result=mysqli_fetch_array($query);
$usedby=$result['usedby'];
if($name!=$usedby){
    return true;
}else{
    return false;
}
}
} 

function ValidateExpiredPin($pin){
    global $conn;
    $sql="SELECT *  FROM  generated_pin ";
    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
$result=mysqli_fetch_array($query);
$date_started=$result['date_gen'];
$expiry_date=$result['date_expired'];
if( $expiry_date > $expiry_date){
    return true;
}else{
    return false;
}

    }
} 

function ValidateCorrectPin($pin){
    global $conn;
    $sql="SELECT *  FROM  generated_pin ";
    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
$result=mysqli_fetch_array($query);
$pin_code=$result['pin'];
if($pin !=  $pin_code){
    return true;
}else{
    return false;
}

    }
} 
?>
