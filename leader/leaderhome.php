<?php
session_start();
if(isset($_SESSION['tname'])&&isset($_SESSION['gname'])){
  include "..\connection.php";
  $na=$_SESSION['tname'];
  $sql="select * from leadertask where leadername='$na'";
  $result=mysqli_query($conn,$sql);
}
else
 header("location:..\home2.php");
?>
<!DOCTYPE html>
<html>
   <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
	   <link rel="stylesheet" href="../bootstrap1/bootstrap.min.css" ></link>
	   <script src="../bootstrap1/bootstrap.min.js"></script>
	   <script src="../bootstrap1/jquery.min.js"></script>
	     <title></title>
	     <style type="text/css">
	   	  li{
	   		margin-right: 20px;
	   	  }
	   	
	   	  }
	   	  th{
	   		text-align: center;
	   	  }
	   	  .tasks{
	   		border-top: 2px solid grey;
	   		border-bottom: 2px solid grey;
        margin-bottom: 10px;
	   	  }
	   	  .navbar{
	   		margin-bottom:0px;
	   		background-color: #f1f1f1;
	   	  }
	   </style>
   </head>
   <body>
    <nav class="navbar navbar-default">
    	<div class="container">
    		<div class="navbar-header">
               <p class="navbar-brand" href="#">Task Management System</p>   			
    		</div>
    		<ul class="nav navbar-nav ">
    			<li><a href="givetask.php"><span class="glyphicon glyphicon-tasks "></span>give task</a></li>
    		</ul>
    		<ul class="nav navbar-nav ">
    			<li><a href="checkgroup.php"><span class="glyphicon glyphicon-user "></span>check group members</a></li>
    		</ul>
    		<ul class="nav navbar-nav ">
    			<li><a href="uploadfile.php"><span class="glyphicon glyphicon-level-up "></span>submit project/file</a></li>
    		</ul>
    		<ul class="nav navbar-nav ">
    			<li><a href="checkuploadedfile.php"><span class="glyphicon glyphicon-level-up "></span>check uploaded file</a></li>
    		</ul>
    		<ul class="nav navbar-nav navbar-right">
    			<li><a href="..\logout.php"><span class="glyphicon glyphicon-log-out "></span>logout</a></li>
    		</ul>
    	</div>
     </nav>
    <div class="tasks">
    	<p class="p"><img src="..\images.png" width="50px" height="50px"><b style="font-size: 24px"><?php echo "welcome ".$_SESSION['gname']." leader ".$_SESSION['tname'] ?></b></p>
    </div>
    <div >
    	<p style="text-align: center; background-color: grey; padding: 20px"><span class="glyphicon glyphicon-tasks "></span>Tasks Given</p>
    	<div class="container">
    	   <table class="table table-bordered table-striped tabe-hover">
          <tr>
             <th>s.no</th>
             <th>task descrption</th>
             <th>submit date</th>
          </tr>
    		  <?php while($row=mysqli_fetch_assoc($result)) {?>
            <tr>
              <td> <?php echo $row['id']?> </td>
              <td> <?php echo $row['taskdiscription']?> </td>
              <td> <?php echo $row['submit_date']?> </td>
            </tr>
          <?php }?>
    	   </table>		
    	</div>																	
    </div>
   </body>
</html>