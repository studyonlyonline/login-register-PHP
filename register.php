<?php 

session_start();
if(isset($_SESSION['user'])!='')
{
	header("Location: home.php");
}

include 'dbconnect.php';
doDB();

if(isset($_POST['btn-signup']))
{
	$uname=mysqli_real_escape_string($mysqli,$_POST['uname']);
	/*echo $uname+"\n";
	*/$email=mysqli_real_escape_string($mysqli,$_POST['email']);
	$upass=md5(mysqli_real_escape_string($mysqli,$_POST['pass']));
	$insert_query="INSERT INTO users VALUES(null,'$uname','$email','$upass')";
	$insert_res=mysqli_query($mysqli,$insert_query);
	/*echo "return value "+$insert_res;*/
	if($insert_res)
	{
		/*echo "worked";*/
		?>
		<script type="text/javascript">alert("registered successfully");</script>
		<?php
	}
	else
	{
		/*echo $insert_res;*/
		?>
		<script type="text/javascript">alert("unsuccessful attempt , registered with email id");</script>
		<?php
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

<div id="login-form">

	<form class="form-horizontal" role="form" method="POST">
		  
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="uname">Username:</label>
		    <div class="col-sm-10">
		      <input type="username" class="form-control" name="uname" placeholder="Enter email">
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Email:</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" name="email" placeholder="Enter email">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pass">Password:</label>
		    <div class="col-sm-10"> 
		      <input type="password" class="form-control" name="pass" placeholder="Enter password">
		    </div>
		  </div>

<!-- 		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <div class="checkbox">
		        <label><input type="checkbox"> Remember me</label>
		      </div>
		    </div>
		  </div> -->
		  
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default" name="btn-signup">Submit</button>
		    </div>
		  </div>
	</form>
	<a href="index.php">Login here </a>
</div>

</body>
</html>
