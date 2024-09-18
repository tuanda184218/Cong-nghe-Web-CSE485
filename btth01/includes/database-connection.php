<?php
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
