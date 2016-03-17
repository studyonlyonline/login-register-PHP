<?php 

session_start();

include 'dbconnect.php';
doDB();

//first check if any session variable is set or not
if(isset($_SESSION['user'])!="")
{
	header('Location: home.php');
}

if(isset($_POST['btn-login']))
{
	$email=mysqli_real_escape_string($mysqli,$_POST['email']);
	$pass=mysqli_real_escape_string($mysqli,$_POST['pass']);

	$get_email_sql="SELECT * FROM users WHERE email='".$email."'";
	$get_email_res=mysqli_query($mysqli,$get_email_sql);
	/*echo "result "+$get_email_res+"\n";*/
	$row=mysqli_fetch_array($get_email_res,MYSQLI_ASSOC);

	if($row['pass']==md5($pass))
	{
		$_SESSION['user']=$row['user_id'];
		header('Location: home.php');
	}
	else
	{
		?>
		<script type="text/javascript">alert("Enter correct details");</script>
		<?php
	}
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login Page</title>
 		<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
 </head>
 <body>
 
 	<form class="form-horizontal" role="form" method="POST" style="margin-top:150px;max-width:450px;">
		  
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

		  
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default" name="btn-login">Submit</button>
		    </div>
		  </div>
	</form>
	<a href="register.php">Register here</a>

 </body>
 </html>