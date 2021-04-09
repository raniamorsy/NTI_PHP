<?php 
   
     require 'connectDB.php';

    $id =  filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT); 


    $sql = "delete from researcher where id = ".$id;

    $op =  mysqli_query($con,$sql);
    $deleteMesssage = '';
    
    if($op){

        $deleteMesssage = "Record deleted";

    }else{

         $deleteMesssage = "Error in delete op";


    }

     $_SESSION['deleteMesssage'] = $deleteMesssage;

    header("Location: display.php");







     

?>