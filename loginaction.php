<?php


if($_SERVER['REQUEST_METHOD']=='POST'){

require 'connectDB.php';
function validation($str){
    return stripcslashes(htmlspecialchars(trim($str)));
}

$email = validation($_POST['email']);
$password = htmlspecialchars(trim($_POST['password']));

$errorflag = 0;

$messageEmpty ='';
$messagePassword ='';
$messageEmail ='';

if(empty($email) || empty($password)){
    $errorflag = 1;
    $messageEmpty ='empty fields';
}
if(FILTER_VAR($email,FILTER_VALIDATE_EMAIL) == FALSE){
    $errorflag = 1;
    $messageEmail ='invalid email';
}
if(strlen($password)< 6){
    $errorflag = 1;
    
    $messagePassword ='invalid password length , must be >= 6';
}

if($errorflag == 0){
   $password = md5($password);
   $sql ="select * from researcher where email = '$email' and password = '$password'";
   $op = mysqli_query($con,$sql);

if(mysqli_num_rows($op) == 1){
    $data =mysqli_fetch_assoc($op);
    $_SESSION['id'] = $data['id'];
    $_SESSION['name'] =$data['name'];
    echo 'user logined';
    header('location: display.php');
}else{
    echo 'error in login';
    header('location: login.php');
    
}

}else{
    $_SESSION['errormessage'] = $messageEmpty.'<br>'.$messageEmail.'<br>'.$messagePassword ;
    header('location: login.php');
}















}else{
    header('location:login.php');
}









?>