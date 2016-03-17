<?php 

function doDB()
{
	global $mysqli;
	$mysqli=mysqli_connect("localhost","root","","login");
	if(mysqli_connect_errno())
	{
		printf("could not connect to database \n %s",mysqli_connect_error());
		exit();
	}
}
 ?>