<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
p{
	font-size:30px;
	color:red;
	font-weight:bold;
	text-align:center;
}
body{
    margin:0;
	padding:0;
}
.image{
	margin:0;
	padding:0;
}
#box{
    margin-left:150px;
	margin-right:150px;
}
#fill{
    border:2px solid red;
	width:1000px;
	padding:10px;
	margin:20px;
}
.navbar{
	width:100%;
	overflow:hidden;
	background-color:#333;
	font-family:'PT Sans', sans-serif;
}
.navbar a{
	float:left;
	display:block;
	color:white;
	text-align:center;
	padding:14px 20px;
	text-decoration:none;

.navbar a:hover{
	background-color:#ddd;
	color:black;
}
</style>
<body>

<div class="image">
<img src="img2.jpg" height="400" width="1390">

<div class="navbar">
   <a href="HomeNew.php">Home</a>
   <a href="ChangePass.php">Change Password</a>
   <a href="UpdateProfile.php">Update Profile</a>
   <a href="DonateInfo.php">Donate Blood</a>
   <a href="BloodInfo.php">Blood Donated</a>
   <a href="View_Request1.php">View Request</a>
   <a href="Home.php">Logout</a>
</div>

<h1 style="text-align:center;color:red">WELCOME TO THE BLOOD BANK</h1>
</br>
</div>
<?php
include ('database.php');
 session_start();
 echo "<p>"."WELCOME"." ".$_SESSION['NAME']."</p>";
?>
</body>
</html> 