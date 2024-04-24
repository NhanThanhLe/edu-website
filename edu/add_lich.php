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
    $mamonhoc = $_POST['mamonhoc'];
    $thoigian = $_POST['thoigian'];
    $diadiem = $_POST['diadiem'];

    $sql = "INSERT INTO lichthi (MaMonHoc, ThoiGian, DiaDiem) 
            VALUES ('$mamonhoc', '$thoigian', '$diadiem')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: admin2.html");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>