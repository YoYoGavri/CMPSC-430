<?php
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

//INSERTION - Department

$sql = "insert into department values ('English', 'Jennings', 10000.00), ('Journalism', 'Morrill', '1500')";
if($conn->query($sql) === TRUE){
	echo "<br/>"; //new line
	echo "Department Insertion Successful";
}
else{
	echo "<br/>"; //new line
	echo "Error accessing the database: ".$conn->error;
}

//INSERTION - Student

$sql = "insert into student values ('1111', 'David', 'Physics', '3.5')";
if($conn->query($sql) === TRUE){
	echo "<br/>"; //new line
	echo "Student Insertion Successful";
}
else{
	echo "<br/>"; //new line
	echo "Error accessing the database: ".$conn->error;
}

//UPDATE - Increase the budget of English department by 10 percent
$sql = "update department set budget = budget*1.10 where dept_name = 'English'";
if($conn->query($sql) === TRUE){
	echo "<br/>"; //new line
	echo "English Budget Update Successful";
}
else{
	echo "<br/>"; //new line
	echo "Error accessing the database: ".$conn->error;
}

//UPDATE - Change the building of Journalism department to Jennings. 
$sql = "update department set building = 'Jennings' where dept_name = 'Journalism'";
if($conn->query($sql) === TRUE){
	echo "<br/>"; //new line
	echo "Journalism Building Name Update Successful";
}
else{
	echo "<br/>"; //new line
	echo "Error accessing the database: ".$conn->error;
}


//Print all data of student table

$sql = "select * from student";
$result = $conn->query($sql);
//number of rows
echo "<br/>Total records: $result->num_rows<br/>";

//Display the rows
if ($result->num_rows>0){
	//output data of each row using loop
	while($row = $result->fetch_assoc()){
		echo "Student ID: ".$row["student_id"]." | Student Name: ".$row["student_name"]." | Department Name: ".$row["dept_name"]." | Total Credits: ".$row["total_credits"]."<br>";
	}
}
else{
	echo "0 results";
}


/*
//Show me the budget of Microbiology department
$sqlHere = "select budget from department where dept_name = 'Microbiology'";
$resultHere = $conn->query($sqlHere);
//number of rows
echo "<br/>Total records: $resultHere->num_rows<br/>";
$valueHere = $resultHere->fetch_assoc();
echo $valueHere["budget"];
*/

//Show me the building of English department
$sqlHere = "select building from department where dept_name = 'English'";
$resultHere = $conn->query($sqlHere);
$valueHere = $resultHere->fetch_assoc();
echo "The English Department is located at: ".$valueHere["building"];



























//terminate the connection
$conn->close();
?>