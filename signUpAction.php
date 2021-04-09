<?php
  
if($_SERVER['REQUEST_METHOD']=='POST'){

require 'connectDB.php';
//validation//
 function validation($str){
     return stripcslashes(htmlspecialchars(trim($str)));
 }
 $name = validation($_POST['name']);
 $email = validation($_POST['email']);
 $password = validation($_POST['password']); 
 $title = validation($_POST['title']);
 $university = validation($_POST['university']);
 $supervisor = validation($_POST['supervisor']);

 $title_paper = validation($_POST['title_paper']);
//uploudfolder study//

    $fileeTmpName = $_FILES['study']['tmp_name']; 
    $fileeName = $_FILES['study']['name'];        
    $fileeSize = $_FILES['study']['size'];         
    
    $fileeType = $_FILES['study']['type'];        
    $fileeExt = explode('.',$fileeName);
     $counte = count($fileeExt) ; 
    $image_name = time().$fileeExt[0]. '.'.strtolower($fileeExt[$counte-1]);
    $allaw_ex = array('docx','doc','pdf');
    if (in_array($fileeExt[$counte-1] ,$allaw_ex )){
        $uploudFoldere = './folder/' ; 
        $studypath =  $uploudFoldere.$image_name ;
        //  if(move_uploaded_file($fileeTmpName,$studypath)){
        //       echo 'file uploud';
        //   }else{
        //      echo 'error uploud';
        //  }
    }else{
          echo 'error extintion';
    };
       

    
//uploudfolder paper//

     $fileTmpName = $_FILES['paper']['tmp_name']; 
     $fileName = $_FILES['paper']['name'];        
     $fileSize = $_FILES['paper']['size'];        
    
    $fileType = $_FILES['paper']['type'];       
    $fileExt = explode('.',$fileName);
    $count = count($fileExt) ; 
    $image_nam = time().$fileExt[0]. '.'.strtolower($fileExt[$count-1]);
    $allaw_ex = array('docx','doc','pdf');
    if (in_array($fileExt[$count-1] ,$allaw_ex )){
        $uploudFolder = './folder/' ; 
        $summarypath =  $uploudFolder.$image_nam ;
         if(move_uploaded_file($fileTmpName,$summarypath)){
             echo 'file uploud';
          }else{
             echo 'error uploud';
         }
    }else{
          echo 'error extintion';
    };
        

    
    

$error =0;
$messageEmpty ='';
$messageEmail ='';
$messagePass ='';
$messagePassword ='';
$messageName ='';
$messageSupervisor ='';
$messageUniversity ='';
$messageEmailFound ='';
$messageInsert ='';
if(empty($email) || empty($name) || empty($password) || empty($title) ||  empty($university) || 
  empty($supervisor) || empty($fileeSize)){
    $error =1;
    $messageEmpty ='empty fields';
}
if(filter_var($email,FILTER_VALIDATE_EMAIL) == FALSE){
    $error =1;
    $messageEmail ='invalid email';
}
if(!preg_match('/^[0-9A-Za-z!@#$%]*$/',$password)){
    $error =1;
    $messagePass ='invalid password ,must be char & num';
}
if(strlen($password) <6){
    $error =1;
    $messagePassword ='invalid password length, must be >6';
}
if(!preg_match('/^[a-zA-Z]*$/', $name)){
    $error =1;
    $messageName ='invalid name ,must be char';
}
if(!preg_match('/^[a-zA-Z]*$/',$supervisor)){
    $error =1;
    $messageSupervisor ='invalid supervisor ,must be char';
}
if(!preg_match('/^[a-zA-Z]*$/', $university)){
    $error =1;
    $messageUniversity ='invalid university ,must be char';
}
///connect///

if($error ==0){

    // $server   = "localhost";
    // $userName = "root";
    // $password = "";
    // $dbName   = "project1";
  
  
    //   $con =  mysqli_connect($server,$userName,$password,$dbName);
  
    //   if(!$con){
          
    //       echo "error in connection ".mysqli_connect_error();
          
    //   }else{
    //       echo 'connect';
    //   }


  $sql = "select * from researcher where email = '$email'";
  $op = mysqli_query($con,$sql);

  if(mysqli_num_rows($op) == 1){

     $messageEmailFound = 'this email just found';
     echo 'emai found';
    
  }else if(mysqli_num_rows($op) == 0){
    $password = md5($password);
     
       if(!empty($title_paper) && !empty($fileName)){ 
       // table supervisor 
       $sql2 = "insert into supervisor (name) values('$supervisor')";
       $res2 =   mysqli_query($con,$sql2);
       $sql7 = "select * from supervisor ";
       $op7  = mysqli_query($con,$sql7);
       while ($data7 = mysqli_fetch_assoc($op7)){
              $id_super = $data7['id'];
         } 
       // table university  
       $sql3 = "insert into university (name) values('$university')";
       $res3 =   mysqli_query($con,$sql3);
       $sql6 = "select * from university ";
       $op6  = mysqli_query($con,$sql6);
       while ($data6 = mysqli_fetch_assoc($op6)){
              $id_uni = $data6['id'];
          }
       // table researcher
       $sql1 = "insert into researcher (name,email,password,study,title,id_uni,id_super) values('$name','$email', '$password','$title','$studypath','$id_uni','$id_super')";
       $res1 =   mysqli_query($con,$sql1);
       $sql5 = "select * from researcher ";
       $op5  = mysqli_query($con,$sql5);
       while ($data5= mysqli_fetch_assoc($op5)){
         echo  $id_search = $data5['id'];
       }
       // table paper      
       $sql4 = "insert into paper (titlePaper,summary,id_searcher) values('$title_paper','$fileName','$id_search')";
       $res4 =   mysqli_query($con,$sql4);

       if($res1 && $res2 && $res3 && $res4){
            $messageInsert =' data insert';
       }
        
                                                                                  
      }else {
        $sql1 = "insert into researcher (name,email,password,study,title,id_uni,id_super) values('$name','$email',
        '$password','$title','$fileeName','$id_uni','$id_super')";
        $res1 =   mysqli_query($con,$sql1);
        $sql2 = "insert into supervisor (name) values('$supervisor')";
        $res2 =   mysqli_query($con,$sql2);
        $sql3 = "insert into university (name) values('$university')";
        $res3 =   mysqli_query($con,$sql3);
        
        if($res1 && $res2 && $res3 ){
            $messageInsert =' data insert';
       }
           
      
      
      } 
      
      
      }
      
      $Message ='';

     $_SESSION['message'] = $Message ;
     
        
  
    
}else{
      $_SESSION['message'] = $messageEmpty .'<br>'. $messageEmail .'<br>'.$messagePass .'<br>'.$messagePassword
      .'<br>'.$messageName.'<br>'.$messageSupervisor.'<br>'.$messageUniversity.'<br>'.$messageEmailFound
       ;
      header('location: signUp.php');
      
}







































}else {
         header('locatiom: signUp.php');
 }



 






?>