<?php

if($_SERVER['REQUEST_METHOD']== 'GET'){

require 'connectDB.php';
if(isset($_GET['search'])){

    $key = htmlspecialchars(trim( $_GET['search']));
    $query = "select researcher.* ,university.name as uni  ,supervisor.name as super from researcher join university on researcher.id_uni=university.id join supervisor on researcher.id_super=supervisor.id   where researcher.title like'$key%' order by id asc ";
    $op = mysqli_query($con,$query);
    $count= mysqli_num_rows($op);
    if($count == 0){
            echo " no result" ;
    }
 }
     
    

}






?>


<html>
    <head>
        <title><?php echo 'Home';?></title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       
        
    </head>
    <body>
    <div id="navbar">
        <nav>
            <ul>
                <li ><a href="face.php">Home</a>  </li>
                <li><a href="signUp.php">register</a> </li>
                <li><a href="log">  </a></li>
                <li ><a href="login.php">Login</a></li>  
            </ul>
        </nav>
        <div id="logo"> 
            <img src="image/2.jpg" alt="logo" >                
        </div>
    </div>
    <div class="all">
            <div class="screen">
            <form method ="GET" action ="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype = "multipart/formdata">    
            <div class="form-group" >
                    
                    <input type="text" name="search" class="form-control"  placeholder="search"
                    value ="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>"  >
                    <br>
                    <div>
                    <button type="submit" class="btn btn-primary">search</button>
                    </div>
                    
            </div>
            </form>
            <table> 
 <th> researcher</th>
  <th>title</th>
  <th>study</th>
  <th>university of MS</th>
  <th>supervisor</th>
   

 <?php
  if ($count != 0){
 while ($data = mysqli_fetch_assoc($op)) {
    
  echo '
  
 <tr>
  <td> '.$data['name'].'</td>
  <td>'.$data['title'].'</td>
  <td>'.$data['study'].'</td>
  <td>'.$data['uni'].'</td>
  <td>'.$data['name'].'</td>

    
  
 </tr>
    ';

}
 
}
 ?>   
</table>


                   
            </div>
           
     </div>

    </body>
</html>