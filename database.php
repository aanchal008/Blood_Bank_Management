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

// Create database
$sql = "CREATE DATABASE bloodBank";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}


$sql1 = "CREATE TABLE SendRequest (
Name VARCHAR(30) NOT NULL,
BloodGroup CHAR(3) NOT NULL,
Units INT NOT NULL,
MobileNumber BIGINT NOT NULL,
Email VARCHAR(50) NOT NULL
)";

if ($conn->query($sql1) === TRUE) {
    echo "Table SendRequest created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql2 = "CREATE TABLE LogIn (
Email VARCHAR(50) NOT NULL,
Password TEXT NOT NULL
)";

if ($conn->query($sql2) === TRUE) {
    echo "Table logIn created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql3 = "CREATE TABLE DonorReg (
Name VARCHAR(30) NOT NULL,
Age INT NOT NULL,
MobileNumber BIGINT NOT NULL,
BloodGroup CHAR(5) NOT NULL,
Email VARCHAR(50) NOT NULL,
Password TEXT NOT NULL
)";
if ($conn->query($sql3) === TRUE) {
    echo "Table DonorReg created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql4 = "CREATE TABLE DonateInfo (
Camp VARCHAR(30) NOT NULL,
Units INT NOT NULL
)";
if ($conn->query($sql4) === TRUE) {
    echo "Table DonateInfo created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
mysqli_close($conn);
?>