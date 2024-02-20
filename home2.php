<?php
error_reporting(0);
session_start();
include "connection.php";
if(isset($_POST['log'])){
   $user=$_POST['user'];
   $pass=$_POST['pass'];
   if(!empty($user)&&!empty($pass)){
   $sql="select * from user where username='$user' and password='$pass'";
   $result=mysqli_query($conn,$sql);
   if(mysqli_num_rows($result) > 0){
      $row=mysqli_fetch_assoc($result);
        if($row['position']=="admin"){
           $_SESSION['tname']=$row['tname'];
           $_SESSION['gname']=$row['groupn'];
           header("Location:"."admin\adminhome.php");
        }
        if($row['position']=="leader"){
           $_SESSION['tname']=$row['tname'];
           $_SESSION['gname']=$row['groupn'];
           header("Location:"."leader\leaderhome.php");
        }
        if($row['position']=="member"){
           $_SESSION['tname']=$row['tname'];
           $_SESSION['gname']=$row['groupn'];
           header("Location:"."member\memberhome.php");
        }
      

   }
   else
      $message="incorrect username or password";
}
   else{
      $message1="please fill all fields";
}

}
?>
<!DOCTYPE html>
<html>
   <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="..\bootstrap\maxcdn.bootstrapcdn.com\bootstrap\3.3.5\css\bootstrap.min.css">
       <script src="..\bootstrap\ajax.googleapis.com/ajax\libs\jquery\1.11.3\jquery.min.js"></script>
       <script src="..\bootstrap\maxcdn.bootstrapcdn.com\bootstrap\3.3.5\js\bootstrap.min.js"></script>
	     <title></title>
	     <style type="text/css">
	   	  .center {
             margin: auto;
             width: 40%;
             box-shadow: -1px 1px 50px 10px black;
             padding: 10px;
            }
           .bb{
               padding-left: 50%;
           }
           
           input,button{
           width: 100%;
           padding: 12px 20px;
           display: inline-block;
           border: 1px solid #ccc;
           border-radius: 4px;
           box-sizing: border-box;
           }
	     </style>
	 </head>
	 <body>
		<div class="container-fluid">
			<div class="page-header">
				<p style="font-size: 24px"><span class="glyphicon glyphicon-print"></span> Task Management System</p>
			</div>
			<div class="center">
				<div class="bb">
					<img  src="images.png" width="100px" height="100px">
				    <p style="font-size: 18px; color: green">Login form</p>
				</div>
                <form action="home2.php" method="post">
                	<b>username:</b>
                	<input type="text" name="user">
                	<b>password:</b>
                	<input type="password" name="pass" style="margin-bottom:10px;"><br>
                  <p id="demo" style="margin-bottom: 10px; color: red; text-align:center"><?php if(isset($message)||isset($message1)){
                      echo $message;
                      echo $message1;
                  } ?></p>           
                	<button  class="btn btn-primary " name="log">login</button>
                </form>
			</div>
			<div>
				<p style="text-align: center; background-color: grey; padding: 20px; font-size: 18px; margin-top: 20px">     copyrights reserved ©2011<br>Task Management System developed by BINIAM BIRHANE 
				</p>
			</div>
		</div>
	 </body>
</html>