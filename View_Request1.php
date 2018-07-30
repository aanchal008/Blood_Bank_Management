<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
.image{
	margin:0;
	padding:0;
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
body{
    margin:0;
	padding:0;
}
#out{
	margin-top:30px;
	  margin-left:150px;
	margin-right:150px;
}
table,th,td{
	text-align:center;
	border:2px solid red;
	border-collapse:collapse;
	padding:5px;
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
</div>66
<div id="out">
<?php
$servername = "localhost";
$username = "root";
$password = "aa";
$dbname = "bloodbank";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3308);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT *  FROM sendrequest";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table style='width:100%'><thead><tr><th>Name</th><th>Blood Group</th><th>Units</th><th>Mobile Number</th><th>Email</th></tr></thead>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Name"]."</td><td>".$row["BloodGroup"]."</td><td>".$row["Units"]."</td><td>".$row["MobileNumber"]."</td><td>".$row["Email"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
</div>
</body>
</html>