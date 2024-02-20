<?php
session_start();
if(isset($_SESSION['tname'])&&isset($_SESSION['gname'])){
include "..\connection.php";
$sql="select * from groupe ";
$result=mysqli_query($conn,$sql);

$sql3="select * from leadertask";
$result3=mysqli_query($conn,$sql3);

$sql1=" select * from user where position='leader' ";
$result1=mysqli_query($conn,$sql1);

if(isset($_GET['dele'])){
  $de=$_GET['dele'];
  $sql2="delete from leadertask where id='$de'";
  $result2=mysqli_query($conn,$sql2);
  header("Location:checktask.php");
}

 if (isset($_POST['submi'])) {
	 $lname=$_POST['ln'];
	 $gname=$_POST['gn'];
	 $submitdate=$_POST['date1'];
	 $discription=$_POST['discr'];
	 $sql2="insert into leadertask(id,leadername,groupname,submit_date,taskdiscription) values('','$lname','$gname','$submitdate','$discription')";
	
	 $result2=mysqli_query($conn,$sql2);

	 header("Location:checktask.php");

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
					<div class="col-lg-8">
						<p style="text-align: center; color: white; font-size: 18px;" class="dash">given task</p>
						<table class="table table-bordered">
							<tr>
								<th>ID</th>
								<th>task</th>
								<th>group</th>
								<th>submit date</th>
								<th>delete</th>
							</tr>
							<?php while($row2=mysqli_fetch_assoc($result3)){?>
								
								<tr>
									<td><?php echo $row2['id']?></td>
									<td><?php echo $row2['taskdiscription']?></td>
									<td><?php echo $row2['groupname']?></td>
									<td><?php echo $row2['submit_date']?></td>
									<td><a href="checktask.php?dele=<?php echo $row2['id']?>" class="btn btn-danger"><span class="  glyphicon glyphicon-trash"></span>delete</a></td>
        
								</tr>
							<?php }?>
						</table>
					</div>
					<div class="col-lg-4">
						<p style="text-align: center; color: white; font-size: 18px;" class="dash">New task</p>
						<form action="checktask.php" method="post">
							<b>select Group:</b>
							<select name="gn">
								<option >select group</option>
								<?php               
								 while($row=mysqli_fetch_assoc($result)){?>
									 <option value="<?php echo $row['groupname']?>"><?php echo $row['groupname']?> </option>
									<?php }?>
							</select>
							<b>select leader:</b>
							<select name="ln">
							 <option >select leader</option>
								<?php               
								 while($row1=mysqli_fetch_assoc($result1)){?>
									<option value="<?php echo $row1['tname']?>"><?php echo $row1['tname']?> </option>
									<?php }?>
							</select>
							<b>submit date</b>
							<input type="date" name="date1">
							<b>task discription</b>
							<textarea style="height: 100px; width: 250px;" name="discr">
								
							</textarea>
							<button class="btn btn-primary" name="submi"> submit</button>

						</form>
					</div>
				</div>
			</div>
	</body>
</html>