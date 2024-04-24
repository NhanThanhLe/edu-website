<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "sinhvien";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

// Sử dụng truy vấn SQL để kiểm tra username và password trên bảng User
$sql = "SELECT u.user_level_id, l.level_title FROM User AS u
        INNER JOIN Login_level AS l ON u.user_level_id = l.level_id
        WHERE u.user_username = '$username' AND u.user_password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($row['level_title'] == 'client') {
        header("Location: client.html");
        exit();
    } 
    elseif ($row['level_title'] == 'admin') {
        header("Location: admin.html");
        exit();
    }
}

header("Location: error.html");
exit();

$conn->close();
?>