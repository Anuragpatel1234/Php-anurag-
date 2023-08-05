<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "user-form";

$conn = new mysqli('localhost','root','', 'user-form');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user_info";
$result = $conn->query($sql);

$users = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    echo "No records found.";
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="">
</head>
<style>
    table{
    border-collapse: collapse;
    width: 100%;
}
th,td{
    border: 1px solid #000;
    text-align: left;
    padding: 12px;
}
th{
    background-color: #f2f2f2;
}
</style>
<body >
    <h2>User Information</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Country</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>About</th>
            <th>Birthday</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
               <td><?= $user['name'] ?></td>
               <td><?= $user['country'] ?></td>
               <td><?= $user['email'] ?></td>
               <td><?= $user['mobile'] ?></td>
               <td><?= $user['about'] ?></td>
               <td><?= $user['birthday'] ?></td>
               <td><a href="delete.php?id=<?= $user['id'] ?>">Delete</a></td>
             </tr>
        <?php endforeach; ?>
        </table>
</body>
</html>