<?php
session_start();
if(isset($_SESSION['tname'])&&isset($_SESSION['gname'])){
include "..\connection.php";
$gn=$_SESSION['gname'];
$sql="select * from user where groupn='$gn'";
$result=mysqli_query($conn,$sql);

}
else
 header("Location:..\home2.php");
?>
<!DOCTYPE html>
<html>
   <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <!-- <link rel="stylesheet" href="..\..\bootstrap\maxcdn.bootstrapcdn.com\bootstrap\3.3.5\css\bootstrap.min.css"> -->
       <link rel="stylesheet" href="../bootstrap1/bootstrap.min.css" ></link>
	   <script src="../bootstrap1/bootstrap.min.js"></script>
	   <script src="../bootstrap1/jquery.min.js"></script>
	     <title></title>
	     <style type="text/css">
	   	.p{
	   		border-top: 2px solid grey;
	   		border-bottom: 2px solid grey;
	   	}
	   	.navbar{
	   		margin-bottom:0px;
	   	}
	   	th{
	   		text-align: center;
	   	}

	   </style>
   </head>
   <body>
   	  <nav class="navbar navbar-default">
         <div class="container">
           <div class="navbar-header">
               <p class="navbar-brand" href="#">Task Management System</p>        
           </div>
           <ul class="nav navbar-nav">
             <li><a href="checkmember.php"><span class="glyphicon glyphicon-user "></span>check members</a></li>
           </ul>
           <ul class="nav navbar-nav ">
             <li><a href="submitfile.php"><span class="glyphicon glyphicon-level-up "></span>submit project/file</a></li>
           </ul>
           <ul class="nav navbar-nav navbar-right">
             <li><a href="..\logout.php"><span class="glyphicon glyphicon-log-out "></span>logout</a></li>
           </ul>
         </div>        
      </nav>
       <div>
    	   <p class="p"><img src="..\images.png" width="50px" height="50px"><b style="font-size: 24px">welcome</b></p>
       </div>
       <div class="container">
           <p style="text-align: center; background-color: grey; padding: 20px;margin-bottom: 0px;">members and leaders</p>
           <table class="table table-bordered table-striped" style="margin-top: 0px;">
           	   <tr>
           	   	   <th>s.no</th>
           	   	   <th>name</th>         	   	   
           	   	   <th>position</th>
           	   </tr>
               <?php while($row=mysqli_fetch_assoc($result)) {?>
                <tr>
                  <td> <?php echo $row['id']?> </td>
                  <td> <?php echo $row['tname']?> </td>
                  <td> <?php echo $row['position']?> </td>
                </tr>
               <?php }?>
           </table>
       </div>

   </body>
</html>