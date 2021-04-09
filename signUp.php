<?php
session_start(); 

?>



<!DOCTYPE html>
    <html lang="en">
    <head>
        
        <title><?php echo 'sign UP';?></title>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    
    <body id="back">
    
   <p style="color:white;"> <?php  if(isset($_SESSION['message'])){  echo $_SESSION['message'];   unset($_SESSION['message']); } ?> </p> 
     
        
        <div class="container">
            <h2 style="color:white">register information of your master’s message in physics</h2>
            <form  method="post" action="signUpAction.php" enctype="multipart/form-data">
              <div id="word">
                <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name" >
                </div> 
    
                <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" >
                </div>
    
                <div class="form-group">
                    <label for="exampleInputPassword1"> </label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"></label>
                    <input type="text" name="title" class="form-control" id="exampleInputPassword1" placeholder="Master’s Title" >
                </div>
               
                <div class="form-group">
                    <label for="exampleInputPassword1"> </label>
                    <input type="text" name="university" class="form-control" id="exampleInputPassword1"  placeholder="Master’s university" >
                </div> 
                <div class="form-group">
                    <label for="exampleInputPassword1"></label>
                    <input type="text" name="supervisor" class="form-control" id="exampleInputPassword1" placeholder="Master’s supervisor" >
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1"></label>
                <input type="text" name="title_paper" class="form-control" id="exampleInputName"     placeholder="tite of paper " > 
                </div>

                <div class="form-group">

                    <input type="file" name="study" class="form-control" style="width:40%" id="exampleInputPassword1"  placeholder="Field of study" >
                    <label for="exampleInputPassword1" style="margin-left:20px;padding-top:10px;">Field of study</label>
                </div>
                
                <div class="form-group">
               
                    <input type="file" name="paper" class="form-control" id="exampleInputName"style="width:40%;"   aria-describedby="Paper"  placeholder="Scientific papers " > 
                    <label for="exampleInputEmail1" style="margin-left:5px;margin-top:10px;"> Scientific papers </label>
                </div> 
                
    
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
       
    </body>
    
    </html>
    