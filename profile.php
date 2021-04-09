<?php
session_start();
 if(isset($_SESSION['id'])){
?>
<p>welcome (<?php echo $_SESSION['name'];?>)</p>
<p>your id |(<?php echo $_SESSION['id'];?>)</p>
<p><a href="login.php">logout</a></p>


<?php }else{
    header('location: login.php');
}