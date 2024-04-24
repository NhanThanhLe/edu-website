<?php
$servername = "localhost";  
$username = "root";     
$password = "123456";    
$dbname = "tencsdl";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $masinhvien = $_POST['masinhvien'];
    $mamonhoc = $_POST['mamonhoc'];
    $diem = $_POST['diem'];

    $sql = "INSERT INTO nhapdiem (MaSinhVien, MaMonHoc, Diem) 
            VALUES ('$masinhvien', '$mamonhoc', $diem)";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: admin3.html");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>