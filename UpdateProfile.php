<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
p{
	font-size:20px;
	font-weight:bold;
	color:red;
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
	text-align:center;
    border:2px solid red;
	width:1000px;
	padding:10px;
	margin:20px;
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
#side{
	margin-left:30px;
}
</style>
</head>
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

<form action="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div id="box">
     <div id="fill">
	      <b>AGE</b>
		  <input type="text" name="age" placeholder="Enter New Age" min="18" max="60" style="width:200px;margin-left:130px" required></br></br>
		  <b>MOBILE NUMBER</b>
		  <input type="text" placeholder="Enter new 10 digit Mobile number" name="mobile_number" style="width:200px;margin-left:25px" required></br></br>
	      <input type="submit" value="update" style="width:100px">
	 </div>
</div>
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

    $var1= $_SESSION['NAME'];
	$var2= $_SESSION['PASS'];
	$age=$mobilenumber="";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$age = $_POST["age"];
	$mobilenumber = $_POST["mobile_number"];
	
	$sql = "SELECT * FROM donorreg WHERE Name = '$var1'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0)
	{ 
      if(Password=='$var2'){
		 $changepassword = "update donorreg set Age = '$age' WHERE Password = '$var2'";
		 $execute = mysqli_query($conn, $changepassword);
			 echo "<p>"."PROFILE UPDATED SUCCESSFULLY!"."</p>";
		 }
		 else{
			 echo "<p>"."ERROR IN UPDATING PROFILE"."</p>";
		 }
	}
	}
?>
</body>
</html>