<html>
<head>
<title>Add Name</title>
</head>
<body>

<?php 
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
	$id=$_POST[id];
	$name=$_POST["name"];
	$join_date=$_POST["join_date"];
	$type=$_POST["type"];
	if($type == 1){
		$type = "Professor";
	} else if($type == 2){
		$type = "FTI";
	}
	else if($type == 3){
		$type = "GPTI";
	}


	$tenure=$_POST["tenure"];
	if($tenure == 1){
		$tenure = "Not Applicable";
	} else if($tenure == 2){
		$tenure = "Tenured";
	}
	else if($tenure == 3){
		$tenure = "Untenured";
	}
	$sql = "INSERT INTO Instructors VALUES ('$id','$name','$join_date','$type','$tenure')" ;
	$result = $conn->query($sql);	
	
	 $conn->close();
	 
?> 

<meta http-equiv="refresh" content="0; URL='http://localhost/Website/forms/output_add_a_professor.php'" />


</body>
</html>