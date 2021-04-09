<?php 

        require 'connectDb.php';
        if(isset($_SESSION['id'])){
         $sql = "select * from researcher where id > 0 order by name asc";
        $op =  mysqli_query($con,$sql);   

?>



<!DOCTYPE HTML>
<html>

<head>
    <title> display</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <style>
        .m-r-1em {
            margin-right: 1em;
        }      
        .m-b-1em {
            margin-bottom: 1em;
        }
        .m-l-1em {
            margin-left: 1em;
        }
        .mt0 {
            margin-top:0;
        }
    </style>

</head>

<body>
    <div class="container">
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
     <p> <?php 
     
     if(isset($_SESSION['deleteMesssage'])){ echo $_SESSION['deleteMesssage'];    unset($_SESSION['deleteMesssage']);   }
    if(isset($_SESSION['editMessage'])){ echo $_SESSION['editMessage'];    unset($_SESSION['editMessage']);   }?>
    
    </p>
        

        <!-- PHP code to read records will be here -->


        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                <th>title</th>
                <th>Action</th>
            </tr>

     <?php   
     
           while ($data = mysqli_fetch_assoc($op)) {
            
             echo '
            <tr>
             <td>'.$data['id'].'</td>
             <td>'.$data['name'].'</td>
             <td>'.$data['email'].'</td>
             <td>'.$data['title'].'</td>
            
              <td><a href="Delete.php?id='.$data['id'].'" class="btn btn-danger m-r-1em">Delete</a>
             <a href="Edit.php?id='.$data['id'].'" class="btn btn-primary m-r-1em">Edit</a> </td>
            </tr>';

           }    
     
     ?>
            
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>


<?php
}else{
    header('location: login.php');
}?>