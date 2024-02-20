<?php
session_start();
if(isset($_SESSION['tname'])&&isset($_SESSION['gname'])){
include "..\connection.php";

if(isset($_GET['dele'])){
  $de=$_GET['dele'];
  $sql2="delete from memberfile where id='$de'";
  $result2=mysqli_query($conn,$sql2);
  header("Location:checkuploadedfile.php");
}

$gn=$_SESSION['gname'];
$sql="select * from memberfile where groupname='$gn' ";
$result=mysqli_query($conn,$sql);

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
          <li><a href="..\home2.php"><span class="glyphicon glyphicon-log-out "></span>logout</a></li>
        </ul>
      </div>
    </nav>
    <div>
        <p class="p"><img src="..\images.png" width="50px" height="50px"><b style="font-size: 24px"><?php echo "welcome ".$_SESSION['gname']." leader ".$_SESSION['tname'] ?></b></p>
    </div>
       <div class="container">
           <p style="text-align: center; background-color: grey; padding: 20px;margin-bottom: 0px; color: white">uploaded files by members</p>
           <table class="table table-bordered table-striped" style="margin-top: 0px;">
               <tr>
                   <th>p.no</th>
                   <th>member name</th>                 
                   <th>project name</th>
                   <th>discription</th>
                   <th>date</th>
                   <th>delete</th>
                   <th>download</th>
               </tr>
               <?php while($row=mysqli_fetch_assoc($result)) {?>
                <tr> 
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['nsender']?></td>
                    <td><?php echo $row['pname']?></td>                   
                    <td><?php echo $row['pinformation']?></td>
                    <td><?php echo $row['cdate']?></td>
                     <td> <a href="checkuploadedfile.php?dele=<?php echo $row['id']?>" class="btn btn-danger"><span class="  glyphicon glyphicon-trash"></span></a></td>
                     <td> <a href="" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt"></span></a></td>
                </tr>
              <?php }?>
           </table>
       </div>

   </body>
</html>