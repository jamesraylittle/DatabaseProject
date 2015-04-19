<html>
<?php 
echo "Your entry has been added. Following are the list of Instructors:<br><br>";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_project";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Join Semester</th>
<th>Type </th>
<th>Tenure Status</th>
</tr>";
$sql = "SELECT * FROM Instructors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	echo "<tr>";
        echo "<td>" . $row["id"]. "</td>";
         echo"<td>" . $row["name"]. "</td>";
         echo"<td>" . $row["join_date"]. "</td>";
         echo"<td>" . $row["type"]. "</td>";
         echo"<td>" . $row["tenure"]. "</td>";
         echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

<a href="http://localhost/Website/test.php" tabindex="3"style="text-decoration:none"><span style="font-family:Cursive;font-size:22px;font-style:normal;font-weight:normal;text-decoration:none;text-transform:none;color:848484;"><br>Go back to Homepage.<br></span></a>
                         
</html>