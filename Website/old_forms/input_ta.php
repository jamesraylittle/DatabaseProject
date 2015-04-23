<html>
<head>
<title>Add Name</title>
</head>
<body>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 } 
	$name=$_POST["name"];
	$id=$_POST["id"];
	$sql = "INSERT INTO table_1 VALUES ($id,'$name')" ;
	$result = $conn->query($sql);	
	
	 $conn->close();
	 
?> 

<meta http-equiv="refresh" content="0; URL='http://localhost/form/form.php'" />


</body>
</html>