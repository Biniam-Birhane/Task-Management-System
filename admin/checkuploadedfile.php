<?php
session_start();
include "..\connection.php";
if(isset($_SESSION['tname'])&&isset($_SESSION['gname'])){
$sql="select * from leaderfile";
$result=mysqli_query($conn,$sql);
 
if(isset($_GET['dele'])){
  $de=$_GET['dele'];
  $sql2="delete from leaderfile where id='$de'";
  $result2=mysqli_query($conn,$sql2);
  header("Location:checkuploadedfile.php");
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
	   	   input,select,button,textarea{
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
      			<p style="text-align: center; color: white; font-size: 18px;" class="dash">project/task uploaded by</p>
      			<table class="table table-bordered table-striped">
      				<tr>
      					<th>ID</th>
      					<th>project name</th>
      					<th>uploaded by</th>
                <th>group name</th>
                <th>discription</th>
      					<th>submit date</th>
      					<th>delete</th>
                <th>download</th>
      				</tr>
              <?php while($row=mysqli_fetch_assoc($result)) {?>
                <tr> 
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['pname']?></td>
                    <td><?php echo $row['nsender']?></td>
                    <td><?php echo $row['groupname']?></td>
                    <td><?php echo $row['pinformation']?></td>
                    <td><?php echo $row['cdate']?></td>
                    <td> <a href="checkuploadedfile.php?dele=<?php echo $row['id']?>"  class="btn btn-danger"><span class="  glyphicon glyphicon-trash"></span></a></td>
                    <td> <a download="<?php echo $row['path']?>" href="checkuploadedfile.php?down=<?php echo $row['path']?>" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt"></span></a></td>
                </tr>
              <?php }?>
      			</table>
      	</div>
      </div>
	</body>
</html>