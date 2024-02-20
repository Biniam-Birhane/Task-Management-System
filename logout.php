<?php
session_start();
if(isset($_SESSION['tname'])){
session_destroy();

header("Location:home2.php");

}

else{
header("Location:home2.php");


}




?>