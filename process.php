<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "user-form";

$conn = new mysqli('localhost','root','', 'user-form');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$country = $_POST['country'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$about = $_POST['about'];
$birthday = $_POST['birthday'];

$sql = "INSERT INTO user_info (name, country, email, mobile, about, birthday)
VALUES ('$name', '$country', '$email', '$mobile', '$about', '$birthday')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>