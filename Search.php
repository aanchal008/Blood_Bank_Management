<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table,th,td{
	margin-top:5px;
	text-align:center;
	border:2px solid red;
	border-collapse:collapse;
	padding:5px;
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
    margin-top:20px;
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
#out{
	margin-top:30px;
	margin-left:150px;
	margin-right:150px;
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
</br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div id="box">
   <div id="fill" style="text-align:center">
   <h2 style="color:red">SEARCH BLOOD</h2></br>
   <b>SEARCH BLOOD GROUP</b><input list="bloodtypes" name="bloodtype" id="side" required></br></br>
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
<input type="submit" value="Search">
</div>
</div>
</form>
</div>
<div id="out">
<?php
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

$bloodgroup="";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$bloodgroup=$_POST["bloodtype"];

$sql = "SELECT *  FROM sendrequest where bloodgroup='$bloodgroup'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table style='width:100%'><thead><tr><th>Name</th><th>Blood Group</th><th>Units</th><th>Mobile Number</th><th>Email</th></tr></thead>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["Name"]."</td><td>".$row["BloodGroup"]."</td><td>".$row["Units"]."</td><td>".$row["MobileNumber"]."</td><td>".$row["Email"]."</td></tr>";
    }
    echo "</table>";
} 
else{
	echo"NO RESULTS FOUND!";
}
}

$conn->close();
?>
</div>
</body>
</html>