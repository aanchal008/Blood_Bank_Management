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
</br>
<form method="post">
<div id="box">
    <div id="fill">
	<h2 style="color:red;text-align:center">DONATE BLOOD</h2>
	 <b>CAMP</b>
	 <input type="text" list="campnames" name="camp" placeholder="Enter Camp name" style="width:200px;margin-left:120px"></br></br>
	 <datalist id="campnames">
     <option>Jivan</option>
     <option>Nirman</option>
	 </datalist>
	 <b>UNITS TO DONATE</b>
	 <input type="text" name="unit" placeholder="Enter units to donate" style="width:200px;margin-left:20px"></br></br>
	 <input type="submit" value="submit" style="width:100px">
	</div>
</div>
</form>
</div>
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

    $camp=$units="";
     if($_SERVER['REQUEST_METHOD'] == "POST"){
		 
		 $camp = $_POST["camp"];
		 $units = $_POST["unit"];
		 
		 $sql = "INSERT INTO DONATEINFO (camp, Units)
		 VALUES ('$camp', '$units')";
		 
		 if  (mysqli_query($conn,$sql)){
			 echo "<p>"."RECORD SAVED!"."</p>";
		 }
		 else{
			 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		 }
	 }
?>
</body>
</html>