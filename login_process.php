<?php
if(isset($_POST['submitted'])){
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: login.php");
    exit();
}

require 'db.php';

$user_login = $_POST['login'];
$user_password = $_POST['password'];

if(empty($user_login) || empty($user_password) ){
    header("location: login.php?error=emptyfields&login=".$user_login."&password=".$user_password);
    exit();
}
else if(!filter_var($user_login, FILTER_VALIDATE_EMAIL)) {
    header("location: login.php?error=invalidmail&password=".$user_password);
    exit();
}else{
    $sql="SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: login.php?error=sqlerror");
        exit();
    } else{
        mysqli_stmt_bind_param($stmt,"ss", $user_login, $user_password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0){
            // Initialize the session
            session_start();
            $_SESSION["logged"] = "true";
            header("location: index.php?login=success");
            exit();
        }else{
            header("location: login.php?error=usernotexists&login=".$user_login."&password=".$user_password);
            exit(); 
        }
    }
}


    
}else{
    header("location: login.php");
    exit();  
}
?>