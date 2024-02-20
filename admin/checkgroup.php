<?php
session_start();
include "..\connection.php";

$sql1="select * from groupe";
$result1=mysqli_query($conn,$sql1);


if(isset($_SESSION['tname'])&&isset($_SESSION['gname'])){

	if(isset($_GET['dele'])){
		$de=$_GET['dele'];
		$sql3="delete from groupe where id='$de'";
		$result3=mysqli_query($conn,$sql3);
		header("Location:checkgroup.php");
	}
	
  if(isset($_POST['submit'])){
   if(!empty($_POST['grou'])){
   $role=$_POST['grou'];
   $sql="insert into groupe(id,groupname) values('','$role')";

	$result=mysqli_query($conn,$sql);
	header("Location:checkgroup.php");
    }
else
 echo "please fill the field";
}
}
else
 header("Location:..\home2.php");
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
	   	   .col-lg-4{
	   	   	background-color: #f1f1f1;
	   	   	height: 70%;
	   	   }
	   	   .col-lg-8{
            
	   	   }
	   	   .dash{
	   	      background-color: grey;
	   	   }
	   	   .list li{
              list-style-type: none;
              margin-bottom: 15px;
	   	   }
	   	   input,select,button{
           width: 100%;
           padding: 12px 20px;
           display: inline-block;
           border: 1px solid #ccc;
           border-radius: 4px;
           box-sizing: border-box;
           padding-left: 0px;
           margin-bottom: 10px;
           }
	     </style>
   </head>
	<body>
	  <nav class="navbar navbar-inverse">
    	<div class="container">
    		<div class="navbar-header">
               <p class="navbar-brand" href="#">admin panel</p>   			
    		</div>
    		<ul class="nav navbar-nav navbar-right">
    			<li><a href="..\logout.php"><span class="glyphicon glyphicon-user"></span>logout</a></li>
    		</ul>
    	</div>
    </nav>
    <div class="row">
      	<div class="col-lg-4">
      		<div class="dash">
      			<p style="text-align: center; color: white; font-size: 24px;">Dashbord</p>
      		</div>
      		<ul class="list">
      			  <li><a href="adminhome.php">create/check/member/leader</a></li>
              <li><a href="checkgroup.php">create/check work group</a></li>
              <li><a href="checktask.php">create/check tasks</a></li>
              <li><a href="checkuploadedfile.php">check uploaded files</a></li>
      		</ul>
      	</div>
      	<div class="col-lg-8">
      		<div class="col-lg-8">
      			<p style="text-align: center; color: white; font-size: 18px;" class="dash">work groups</p>
      			<table class="table table-bordered table-striped">
      				<tr>
      					<th>sr.no</th>
      					<th>name</th>
      					<th>leaders</th>
      					<th>members</th>     			
      					<th>delete</th>
      				</tr>
              <?php while($row=mysqli_fetch_assoc($result1)){?>
              <tr>
                 <td><?php echo $row['id']?></td>
                 <td><?php echo $row['groupname']?></td>
                 <td></td>
                 <td></td>
                 <td> <a href="checkgroup.php?dele=<?php echo $row['id']?>" class="btn btn-danger" ><span class="  glyphicon glyphicon-trash"></span>delete</a></td>
              </tr>
            <?php }?>
      			</table>
      		</div>
      		<div class="col-lg-4">
      			<p style="text-align: center; color: white; font-size: 18px;" class="dash">create new group</p>
      			<form action="checkgroup.php" method="post">
      				<b>Group name:</b>
      				<input type="text" name="grou">
              <input type="submit" value="submit" class="btn btn-primary" name="submit">
      			</form>
      		</div>
      	</div>
    </div>
	</body>
</html>