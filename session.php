
<?php
session_start();


//students error messages with link starts here

function ErrorUser(){
    if(isset($_SESSION['ErrorUser'])){
        $result="<div class='alert alert-danger' role='alert'>Your Portal Username Could Not Be Found. <a href='reg.php' class='alert-link'>Create Profile Now!</a>";
        $result .=htmlentities($_SESSION['ErrorUser']);
        //$_SESSION['error_message']=null;
        $result.="</div>";
        return $result;
    }
    }
    function ErrorReg(){
        if(isset($_SESSION['ErrorReg'])){
            $result="<div class='alert alert-danger' role='alert'>Your Portal Reg No Is Invalid. Contact The Registra . <a href='registra.php' class='alert-link'>Contact  Now!</a>";
            $result .=htmlentities($_SESSION['ErrorReg']);
           // $_SESSION['error_message']=null;
            $result.="</div>";
            return $result;
        }
        }
        //error messages with links ends here..



        //students normal session messages without links starts here
function EmptyField(){
    if(isset($_SESSION['EmptyField'])){
        $result="<div class='alert alert-dark'>";
        $result .=htmlentities($_SESSION['EmptyField']);
       // $_SESSION['error_message']=null;
        $result.="</div>";
        return $result;
    }
}

function AcceptTerms(){
    if(isset($_SESSION['AcceptTerms'])){
        $result="<div class='alert alert-dark'>";
        $result .=htmlentities($_SESSION['AcceptTerms']);
       // $_SESSION['error_message']=null;
        $result.="</div>";
        return $result;
    }
}

function Index(){
    if(isset($_SESSION['Index'])){
        $result="<div class='alert alert-success' role='alert'>\r\n\r\n Your Login Was Successfull. You Will Be Redirected To Your Dashboard In 10 Seconds!  <p><img src='images/loader.gif' alt='loader' /></p>";
        $result .=htmlentities($_SESSION['Index']);
       // $_SESSION['error_message']=null;
        $result.="</div>";
        return $result;
    }
}

function DashBoardSerial(){
    if(isset($_SESSION['DashBoardSerial'])){
        $result="<div class='alert alert-dark'>";
        $result .=htmlentities($_SESSION['DashBoardSerial']);
       // $_SESSION['error_message']=null;
        $result.="</div>";
        return $result;
    }
}
function ErrorNotLoggedin(){
    if(isset($_SESSION['ErrorNotLoggedin'])){
        $result="<div class='alert alert-dark'>";
        $result .=htmlentities($_SESSION['ErrorNotLoggedin']);
       //$_SESSION['error_message']=null;
        $result.="</div>";
        return $result;
    }
}

//admin session message  with links starts here

function AdminFieldError(){
if(isset($_SESSION['AdminFieldError'])){
    $result="<div class='alert alert-danger'>";
    $result .=htmlentities($_SESSION['AdminFieldError']);
    $result .="</div>";
    $_SESSION['AdminFieldError']=null;
    return $result;
}
}

function AdminStdntName(){
    if(isset($_SESSION['AdminStdntName'])){
        $result="<div class='alert alert-dark'>";
        $result .=htmlentities($_SESSION['AdminStdntName']);
        $result .="</div>";
       $_SESSION['AdminStdntName']=null;
        return $result;
    }
}

function AdminStdntUploadPdf(){
    if(isset($_SESSION['AdminStdntUploadPdf'])){
        $result="<div class='alert alert-dark'>";
        $result .=htmlentities($_SESSION['AdminStdntUploadPdf']);
        $result .="</div>";
       $_SESSION['AdminStdntUploadPdf']=null;
        return $result;
    }
}

function AdminStdntUploadFailed(){
    if(isset($_SESSION['AdminStdntUploadFailed'])){
        $result="<div class='alert alert-danger'>";
        $result .=htmlentities($_SESSION['AdminStdntUploadFailed']);
        $result .="</div>";
       $_SESSION['AdminStdntUploadFailed']=null;
        return $result;
    }
}
function AdminLogout(){
    if(isset($_SESSION['AdminLogout'])){
        $result="<div class='alert alert-success'>";
        $result .=htmlentities($_SESSION['AdminLogout']);
        $result .="</div>";
       $_SESSION['AdminLogout']=null;
        return $result;
    }
}

function AdminEmptyError(){
    if(isset($_SESSION['AdminEmptyError'])){
        $result="<div class='alert alert-danger'>";
        $result .=htmlentities($_SESSION['AdminEmptyError']);
        $result .="</div>";
        $_SESSION['AdminEmptyError']=null;
        return $result;
    }
}

function AdminPassLenghtError(){
    if(isset($_SESSION['AdminPassLenghtError'])){
        $result="<div class='alert alert-success' role='alert'>\r\n\r\n Your Login Was Successfull. You Will Be Redirected To Your Dashboard In 10 Seconds!  <p><img src='../images/loader.gif' alt='loader' /></p><br>";
        
        $result .=htmlentities($_SESSION['AdminPassLenghtError']);
       $_SESSION['AdminPassLenghtError']=null;
       
        $result.="</div>";
        return $result;
    }
}


function AdminLoginError(){
    if(isset($_SESSION['AdminLoginError'])){
        $result="<div class='alert alert-danger'>";
        $result .=htmlentities($_SESSION['AdminLoginError']);
        $result .="</div>";
        $_SESSION['AdminLoginError']=null;
        return $result;
    }
}
function AdminExamPin(){
    if(isset($_SESSION['AdminExamPin'])){
        $result="<div class='alert alert-danger'>";
        $result .=htmlentities($_SESSION['AdminExamPin']);
        $result .="</div>";
        $_SESSION['AdminExamPin']=null;
        return $result;
    }
}

function AdminExamPinG(){
    if(isset($_SESSION['AdminExamPinG'])){
        $result="<div class='alert alert-danger'>";
        $result .=htmlentities($_SESSION['AdminExamPinG']);
        $result .="</div>";
        $_SESSION['AdminExamPinG']=null;
        return $result;
    }
}
function AdminS(){
    if(isset($_SESSION['AdminS'])){
        $result="<div class='alert alert-success'>";
        $result .=htmlentities($_SESSION['AdminS']);
        $result .="</div>";
        $_SESSION['AdminS']=null;
        return $result;
    }
}

//admin session message  with links ends here


//admin session message  without  links starts here


//admin session message  without links ends here

?>
