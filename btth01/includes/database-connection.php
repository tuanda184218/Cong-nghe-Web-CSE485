<?php
<<<<<<< HEAD
$servername = "localhost"; // Tên server của bạn
$username = "root";        // Username MySQL
$password = "";            // Mật khẩu MySQL (nếu có)
$dbname = "BTTH01_CSE485"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
=======
    $type = 'mysql'; //Loại cơ sở dữ liệu
    $server = 'localhost';//Địa chỉ máy chủ
    $db = 'BTTH01_CSE485'; //Ten co so du lieu muon ket noi
    $port = '3306'; //Cổng của MySQL
    $charset = 'utf8mb4'; //Bộ mã hoá ký tự
    $username = 'root';
    $password = '';

$dsn = "$type:host=$server;dbname=$db;port=$port;charset=$charset"; // Create DSN
try {                                                               // Try following code
    $pdo = new PDO($dsn, $username, $password);                     // Create PDO object
    echo "Kết nối thành công!";                                     // If connection is successful
} catch (PDOException $e) {                                         // If exception thrown
    echo "Lỗi kết nối: " . $e->getMessage();                        // Display error message
}
>>>>>>> ebc403614ce0e0db6107934eb7e275e7b86644e0
