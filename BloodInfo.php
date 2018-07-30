<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
table,th,td{
	text-align:center;
	border:2px solid red;
	border-collapse:collapse;
	padding:5px;
}
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
	text-align:center;
}
.navbar{
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
}
.navbar a:hover{
	background-color:#ddd;
	color:black;
}
#out{
	margin-top:30px;
	  margin-left:150px;
	margin-right:150px;
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
</br>
</div>
<div id="out">
<?php
    session_start();
$servername = "localhost";
$username = "root";
$password = "aa";
$dbname = "bloodbank";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, 3308);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
		 $sql = "SELECT * FROM DONATEINFO";
		 $result = mysqli_query($conn,$sql);
		 
		 if(mysqli_num_rows($result)>0)
		 {
			 echo "<table style='width:100%'><thead><tr><th>Camp</th><th>Units</th></tr></thead>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["Camp"]."</td><td>".$row["Units"]."</td></tr>";
    }
    echo "</table>";
		 }
		 else{
			 echo "<p>"."NO RESULTS FOUND"."</p>";
		 }
?>
</div>
</body>
</html>