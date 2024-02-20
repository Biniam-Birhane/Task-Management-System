<?php
error_reporting(0);
session_start();
if(isset($_SESSION['tname'])&&isset($_SESSION['gname'])){
include "..\connection.php";
$g=$_SESSION['gname'];
$sql2="select * from membertask where gname='$g'";
$result2=mysqli_query($conn,$sql2);

$sn=$_SESSION['tname'];
$gn=$_SESSION['gname'];
$sql1="select * from user where groupn='$gn' and position='member' ";
$result1=mysqli_query($conn,$sql1);

if(isset($_GET['dele'])){
  $de=$_GET['dele'];
  $sql3="delete from membertask where id='$de'";
  $result3=mysqli_query($conn,$sql3);
  header("Location:givetask.php");
}

if(isset($_POST['submi'])){
  if((!empty($_POST['memname']))&&(!empty($_POST['date1']))&&(!empty($_POST['discri']))){
  $memname=$_POST['memname'];
  $submidate=$_POST['date1'];
  $discri=$_POST['discri'];

  $sql="insert into membertask(id,membername,taskdiscription,submit_date,gname) values('','$memname','$discri','$submidate','$gn')";
  $result=mysqli_query($conn,$sql);
  header("Location:givetask.php");
}

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
	   	  .p{
	   		border-top: 2px solid grey;
	   		border-bottom: 2px solid grey;
	   	  }
	   	  .navbar{
	   		margin-bottom:0px;
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
         .col-lg-4{
         	box-shadow: 2px 3px grey;
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
      <div>
    	   <p class="p"><img src="..\images.png" width="50px" height="50px"><b style="font-size: 24px"><?php echo "welcome ".$_SESSION['gname']." leader ".$_SESSION['tname'] ?></b></p>
      </div>
      <div class="row">
       	   <div class="col-lg-4">
               <p style="text-align: center; background-color: grey; padding: 20px; color: white; font-size: 18px;"><span class="glyphicon glyphicon-tasks"></span>Give Tasks</p>
               <form style="padding-left: 10px;" action="givetask.php" method="post">
               	   <b>select members</b>
               	   <select name="memname">
               	   	   <option>select members</option>
                       <?php
                       while($row1=mysqli_fetch_assoc($result1)){
                       ?>
                       <option value="<?php echo $row1['tname']?>"><?php echo $row1['tname'] ?></option>
                     <?php }?>
               	   </select>
               	   <b>submit date</b>
               	   <input type="date" name="date1">
               	   <b>Task discription</b>
               	   <textarea name="discri">
               	   	
               	   </textarea>
               	   <button class="btn btn-primary" style="margin-bottom: 10px;" name="submi">submit</button>
               </form>
       	   </div>
       	   <div class="col-lg-8">
       	   	   <p style="text-align: center;background-color: grey; padding: 20px; color: white">Given Tasks to Members</p>
       	   	   <table class="table table-bordered">
      				    <tr>
      					    <th>s.no</th>
      					    <th>member name</th>
      					    <th>discrption</th>
      					    <th>submit date</th>
      					    <th>delete</th>
      				    </tr>
                  <?php while($row2=mysqli_fetch_assoc($result2)){ ?>
                    <tr>
                      <td> <?php echo $row2['id']?> </td>
                      <td> <?php echo $row2['membername']?> </td>
                      <td> <?php echo $row2['taskdiscription']?> </td>
                      <td> <?php echo $row2['submit_date']?> </td>
                      <td> <a href="givetask.php?dele=<?php echo $row2['id']?>" class="btn btn-danger"><span class="  glyphicon glyphicon-trash"></span></a></td>
                     
                    </tr>
                  <?php }?>
      			   </table>
       	   </div>
      </div>
   </body>
</html>