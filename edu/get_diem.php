<?php
$servername = "localhost";  
$username = "root";     
$password = "123456";    
$dbname = "tencsdl";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT * FROM nhapdiem";
$result = $conn->query($sql);

$models = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $models[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($models);

$conn->close();
?>
