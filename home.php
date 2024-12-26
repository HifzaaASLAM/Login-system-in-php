<?php 

session_start();
include('header.php'); ?>
<?php
if(isset($_SESSION['uname'])){
    echo "<h2>hello ".$_SESSION['uname']."</h2>";
} 

else{
    header('location:index.php');
}
?>
    
<a href="logout_process.php " class="btn btn-danger" > logout </a>
<?php include('footer.php'); ?>