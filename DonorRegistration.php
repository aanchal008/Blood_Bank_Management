<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
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
#slide{
    margin-left:50px;
}
#slide1{
    margin-left:110px;
}
#slide2{
    margin-left:34px;
}
#slide3{
    margin-left:100px;
}
#slide4{
    margin-left:75px;
}
#slide5{
    margin-left:20px;
}
#out{
    margin-left:150px;
	margin-right:150px;
}
#fill{
    border:2px solid red;
	width:1000px;
	padding:10px;
	margin:20px;
	
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
</style>
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
<form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div id="out">
<div id="fill">
    <div id="fillin" style="text-align:center">
	<h2 style="color:red">DONOR REGISTRATION</h2>
    <b>Donor Name</b><input type="text" placeholder="Enter Name" name="name" style="width:200px" id="slide" required></br></br>
	
    <b>Age</b><input type="number" placeholder="Enter Age" name="age" min="18" max="60" style="width:200px" id="slide1" required></br></br>
	
    <b>Mobile Number</b><input type="text" placeholder="Enter 10 digit mobile number" name="mobile_number" style="width:200px" id="slide2" required></br></br>

    <b>Blood Group</b><input list="bloodtypes" name="bloodtype" style="width:200px" id="slide" required></br></br>
	<datalist id="bloodtypes">
    <option>A+</option>
    <option>A-</option>
    <option>B+</option>
    <option>B-</option>
    <option>O+</option>
    <option>O-</option>
    <option>AB+</option>
    <option>AB-</option>
    </datalist>
	
    <b>Email</b><input type="text" placeholder="Enter Email" name="email" style="width:200px" id="slide3" required></br></br>

    <b>Password</b><input type="password" placeholder="Enter Password" name="psw" style="width:200px" id="slide4" required></br></br>
	
	<input type="submit" value="Register"></br></br>
	<p>Account already created..<a href="LogIn.php">LogIn</a></p>
	</div>
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

  $name= $bloodgroup= $age= $mobilenumber= $email=$pass="";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST["name"];
	$age = $_POST["age"];
	$mobilenumber = $_POST["mobile_number"];
	$bloodgroup = $_POST["bloodtype"];
	$email = $_POST["email"];
	$pass = $_POST["psw"];
	
	$_SESSION['EMAIL'] = "$email";
	header('Location:UpdateProfil.php');
     $sql = "INSERT INTO donorreg (Name, Age, MobileNumber, BloodGroup, Email, Password)
     VALUES ('$name','$age','$mobilenumber' ,'$bloodgroup','$email','$pass')";
			 
     if (mysqli_query($conn, $sql)) {
    echo "<p>Registered! <a href='LogIn.php'>LogIn</a> to continue</p>";
     }else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>

</body>
</html>