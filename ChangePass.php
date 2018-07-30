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
<div style="margin-left:150px;margin-right:150px">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p style="color:red;font-size:20px;text-align:center;font-weight:bold">CHANGE PASSWORD </p>
	<div style="text-align:center;border:2px solid red;width:1000px;padding:10px;margin:20px">
	<b>OLD PASSWORD</b>
	<input type="password" placeholder="Old Password" name="oldpass" style="width:200px;margin-left:62px" required></br></br>
	<b>NEW PASSWORD</b>
	<input type="password" placeholder="New Password" name="newpass" style="width:200px;margin-left:62px" required></br></br>
	<b>CONFIRM PASSWORD</b>
	<input type="password" placeholder="Conform Password" name="confpass" style="width:200px;margin-left:25px" required></br></br>
	<input type="submit" value="update"  style="width:100px">
	</div>
</form>
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
	$previous=$newpass=$confirmpass="";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$previous = $_POST["oldpass"];
	$newpass = $_POST["newpass"];
	$confirmpass = $_POST["confpass"];
	
	
	$sql = "SELECT DISTINCT * FROM donorreg WHERE Password = '$previous'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0)
	{
		if($newpass == $confirmpass)
		{
			$changepassword = "update donorreg set Password = '$newpass' where Password = '$previous' AND Name = '$var1'";
		 $execute = mysqli_query($conn, $changepassword);
			 //echo "<p>"."PASSWORD CHANGED SUCCESSFULLY!"."</p>";
			 header('Location:PassChanged.php');
		 }
		 else{
			 echo "<p>"."ERROR IN CHANGING PASSWORD"."</p>";
		 }
	}
	}
?>
</body>
</html>