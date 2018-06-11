<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,"digixforce");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$name=$_POST["name"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$pass=$_POST["pass1"];



$sql = "INSERT INTO registration (name,email,phone,password,address,status)
VALUES ('$name','$email','$phone','$pass','abc','unpaid')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
//header('Location: "index.html");

?>