<html>
<body>

<?php
$value1 = $_POST["student_id"];
$value2 = $_POST["student_name"];
$value3 = $_POST["dept_name"];
$value4 = $_POST["total_creds"];
//echo $value1;
//echo " ";
//echo $value2;
//echo " ";
//echo $value3;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universitydb";

//Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if($conn->connect_error){
	die("Connection failed:".$conn->connect_error);
}
else{
	echo "Successfully connected to the database";
}

//DO YOUR TASK


$sql = "insert into student values ('$value1', '$value2', '$value3', '$value4')";
if($conn->query($sql) === TRUE){
	echo "<br/>"; //new line
	echo "Insertion Successful";
}
else{
	echo "<br/>"; //new line
	echo "Error accessing the database: ".$conn->error;
}

//terminate the connection
$conn->close();
?>

</body>
</html>