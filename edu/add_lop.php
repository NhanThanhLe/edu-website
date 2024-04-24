<?php
$servername = "localhost";  
$username = "root";     
$password = "123456";    
$dbname = "sinhvien";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $thongtin = $_POST['name'];

    $sql = "INSERT INTO Class (class_title) 
            VALUES ('$thongtin')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: admin.html");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>