<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
p{
	color:red;
	text-align:center;
	font-size:20px;
	font-weight:bold;
}
body{
    margin:0;
	padding:0;
}
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
#fill{
    border:2px solid red;
	width:1000px;
	padding:10px;
	margin:20px;
}
#out{

    margin-left:150px;
	margin-right:150px;
}
#side{
    margin-left:50px;
}
#side1{
    margin-left:50px;
}
</style>
</head>
<body>

<div class="image">
<img src="img2.jpg" height="400" width="1390">

<div class="navbar">
   <a href="Home.php">Home</a>
   <a href="Search.php">Search</a>
   <a href="SendRequest.php">Send Request</a>
   <a href="View_Request.php">View Request</a>
   <a href="LogIn.php">Log In</a>
   <a href="About.php">Contact Us</a>
</div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div id="out">
    <div id="fill" style="text-align:center">
   <h2 style="color:red">BLOOD DONOR LOGIN</h2>
   <b>USERNAME</b>
   <input type="text" name="username" placeholder="Enter username" id="side" autocomplete:on autofocus></br></br>
   <b>PASSWORD</b>
   <input type="password" name="pass" id="side1" ></br></br>
   <input type="submit" value="Log In"></br></br>
   <P>NOT REGISTERED AS DONOR?</p>
   <p><a href="DonorRegistration.php">SIGN UP</a> HERE</P>
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


$email= $password="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username= $_POST["username"];
$password= $_POST["pass"];
$_SESSION['NAME']="$username";
$_SESSION['PASS']="$password";
header('Location:ChangePass.php');
header('Location:UpdateProfile.php');

$sql = "SELECT DISTINCT * FROM donorreg WHERE Name='$username' AND Password = '$password' ";
$_SESSION['NAME']="$username";
$_SESSION['PASS']="$password";
header('Location:ChangePass.php');
header('Location:UpdateProfile.php');
$result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) == 1) {
          header('location:HomeNew.php');
}
      else
	  {
		  echo "<p>NOT REGISTERED!</p>";
	  }
}

$conn->close();
?>

</body>
</html>