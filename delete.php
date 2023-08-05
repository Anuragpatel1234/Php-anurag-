<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "user-form";

$conn = new mysqli('localhost','root','', 'user-form');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM user_info WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

header("Location: display.php");
?>