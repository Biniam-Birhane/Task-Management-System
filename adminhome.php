<!DOCTYPE html>
<html>
   <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="..\bootstrap\maxcdn.bootstrapcdn.com\bootstrap\3.3.5\css\bootstrap.min.css">
       <script src="..\bootstrap\ajax.googleapis.com/ajax\libs\jquery\1.11.3\jquery.min.js"></script>
       <script src="..\bootstrap\maxcdn.bootstrapcdn.com\bootstrap\3.3.5\js\bootstrap.min.js"></script>
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
	   	   input,select{
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
    			<li><a href="#"><span class="glyphicon glyphicon-user"></span>logout</a></li>
    		</ul>
    	</div>
      </nav>
      <div class="row">
      	<div class="col-lg-4">
      		<div class="dash">
      			<p style="text-align: center; color: white; font-size: 24px;">Dashbord</p>
      		</div>
      		<ul class="list">
      			<li><a href="">create/check/member/leader</a></li>
      		    <li><a href="">create/check work group</a></li>
      		    <li><a href="">create/check tasks</a></li>
      		    <li><a href="">check uploaded files</a></li>
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
      			</table>
      		</div>
      		<div class="col-lg-4">
      			<p style="text-align: center; color: white; font-size: 18px;" class="dash">New Member/Leader</p>
      			<form>
      				<b>name:</b>
      				<input type="text" name="">
      				<b>username:</b>
      				<input type="text" name="">
      				<b>password:</b>
      				<input type="text" name="">
      				<b>Group:</b>
      				<select>
      					<option>java developer</option>
      				</select>
      				<b>position:</b>
      				<select>
      					<option>member</option>
      					<option>leader</option>
      				</select>
      			</form>
      		</div>
      	</div>
      </div>
	</body>
</html>