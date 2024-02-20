<?php
session_start();
if(isset($_SESSION['tname'])&&isset($_SESSION['gname'])){
include "..\connection.php";
$na=$_SESSION['tname'];
$gn=$_SESSION['gname'];
$sql1="select * from leaderfile where nsender='$na'";
$result=mysqli_query($conn,$sql1);

 if(isset($_GET['dele'])){
  $de=$_GET['dele'];
  $sql2="delete from leaderfile where id='$de'";
  $result2=mysqli_query($conn,$sql2);
  header("Location:uploadfile.php");
  }
 if(isset($_POST['submi'])){
      $name=basename($_FILES['upload']['name']);//the basename function is used to use the name and the extension of the file
      $tname=$_FILES['upload']['tmp_name'];//temporary name of file that going to upload
      if(move_uploaded_file($tname, "../leaderfile/".$name))//the function is used to move the file to the folder
        { 
          $discri=$_POST['pinfo'];
          $date1=date("y/m/d");
          $sql="insert into leaderfile(id,pname,cdate,pinformation,nsender,groupname,path) values('','$name','$date1','$discri','$na','$gn','../leaderfile/$name') ";
          $res=mysqli_query($conn,$sql);
          header("Location:uploadfile.php");
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
	   	   button,textarea{
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
               <p style="text-align: center; background-color: grey; padding: 20px; color: white; font-size: 18px;"><span class="glyphicon glyphicon-open"></span>upload file</p>
               <form style="padding-left: 10px;" action="uploadfile.php" method="post" enctype="multipart/form-data">
               	   <b>project file</b>
               	   <input type="file" name="upload">
               	   <b>project information</b>
               	   <textarea name="pinfo">
               	   	
               	   </textarea>
               	   <button class="btn btn-primary" style="margin-bottom: 10px;" name="submi">upload</button>
               </form>
       	   </div>
       	   <div class="col-lg-8">
       	   	   <p style="text-align: center;background-color: grey; padding: 20px; color: white">uploaded files</p>
       	   	   <table class="table table-bordered">
      				<tr>
      					<th>s.no</th>
      					<th>project name</th>
      					<th>date</th>
      					<th>delete</th>
      					<th>download</th>
      				</tr>
              <?php while($ro=mysqli_fetch_assoc($result)) {?>
                <tr>
                  <td><?php echo $ro['id']?></td>
                  <td><?php echo $ro['pname']?></td>
                  <td><?php echo $ro['cdate']?></td>
                  <td> <a href="uploadfile.php?dele=<?php echo $ro['id']?>" class="btn btn-danger"><span class="  glyphicon glyphicon-trash"></span></a></td>
                  <td> <a href="" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt"></span></a></td>
                </tr>
              <?php }?>
      			</table>
       	   </div>
      </div>
   </body>
</html>