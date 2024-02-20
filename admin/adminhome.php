<?php
session_start();
if(isset($_SESSION['tname'])&&isset($_SESSION['gname'])){
include "../connection.php";

$sql1="select * from user where position ='leader' or position='member'";
$result1=mysqli_query($conn,$sql1);

$sql="select * from groupe ";
$result=mysqli_query($conn,$sql);

if(isset($_GET['dele'])){
  $de=$_GET['dele'];
  $sql2="delete from user where id='$de'";
  $result2=mysqli_query($conn,$sql2);
  header("Location:adminhome.php");
}
if(isset($_POST['submi'])){
  $fname=$_POST['fname'];
  $user=$_POST['user'];
  $pass=$_POST['pass'];
  $group=$_POST['groupme'];
  $position=$_POST['mem'];
 

  if((!empty($fname))&&(!empty($user))&&(!empty($pass))&&(!empty($group))&&(!empty($position))){
     $sqli="insert into user(id,tname,username,password,groupn,position) values('','$fname','$user','$pass','$group','$position')";
     $resulti=mysqli_query($conn,$sqli);
     header("Location:adminhome.php");
   }
   else{
    echo "please fill all the fields";
   }
}
}
else
 header("Location:../home2.php");
?>
<!DOCTYPE html>
<html>
  <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
			 <meta charset="UTF-8">
	   <link rel="stylesheet" href="../bootstrap1/bootstrap.min.css" ></link>
	   <script src="../bootstrap1/bootstrap.min.js"></script>
	   <script src="../bootstrap1/jquery.min.js"></script>
	     <title></title>
	     <style type="text/css">
	   	   .col-lg-4{
	   	   	background-color: #f1f1f1;
	   	   	
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
    			<li><a href="../logout.php"><span class="glyphicon glyphicon-user"></span>logout</a></li>
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
      			<p style="text-align: center; color: white; font-size: 18px;" class="dash">All Members/Leaders</p>
      			<table class="table table-bordered">
      				<tr>
      					<th>ID</th>
      					<th>name</th>
      					<th>user</th>
      					<th>pass</th>
      					<th>position</th>
      					<th>group</th>
      					<th>delete</th>
      				</tr>
              <?php while($row1=mysqli_fetch_assoc($result1)) {?>
                <tr>
                  <td> <?php echo $row1['id']?> </td>
                  <td> <?php echo $row1['tname']?> </td>
                  <td> <?php echo $row1['username']?> </td>
                  <td> <?php echo $row1['password']?> </td>
                  <td> <?php echo $row1['position']?> </td>
                  <td> <?php echo $row1['groupn']?> </td>
                  <td> <a href="adminhome.php?dele=<?php echo $row1['id']?>" class="btn btn-danger" ><span class="  glyphicon glyphicon-trash"></span>delete</a></td>      
                </tr>
              <?php }?>
      			</table>
      		</div>
      		<div class="col-lg-4">
      			<p style="text-align: center; color: white; font-size: 18px;" class="dash">New Member/Leader</p>
      			<form action="adminhome.php" method="post">
      				<b>ስም:</b>
      				<input type="text" name="fname">
      				<b>username:</b>
      				<input type="text" name="user">
      				<b>password:</b>
      				<input type="password" name="pass">
      				<b>Group:</b>
      				<select name="groupme">
                <option >select group</option>
                <?php               
                 while($row=mysqli_fetch_assoc($result)){?>
                   <option value="<?php echo $row['groupname']?>"><?php echo $row['groupname']?> </option>
                      <?php }?>
      					
      				</select>
      				<b>position:</b>
      				<select name="mem">
      					<option value="member">member</option>
      					<option value="leader">leader</option>
      				</select>
              <button class="btn btn-primary" name="submi"> submit</button>
      			</form>
      		</div>
      	</div>
      </div>
	</body>
</html>