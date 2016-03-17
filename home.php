<?php
session_start();
include_once 'dbconnect.php';
doDB();

$v=1;
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
$res=mysqli_query($mysqli,"SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
 <div id="left">
    <label>cleartuts</label>
    </div>
    <div id="right">
     <div id="content">
         hi' 
         <?php echo $userRow['username']; 
         	 echo "<a href=\"logout.php?logout=a\">Sign Out</a>"
         ?>&nbsp;
       
        </div>
    </div>
</div>
</body>
</html>