
    <table style='width:100%'><thead><tr><th>Name</th><th>Blood Group</th><th>Units</th><th>Mobile Number</th><th>Email</th></tr></thead>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["Name"]."</td><td>".$row["BloodGroup"]."</td><td>".$row["Units"]."</td><td>".$row["MobileNumber"]."</td><td>".$row["Email"]."</td></tr>";
    }
