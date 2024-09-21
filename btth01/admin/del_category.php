<?php
require '../includes/database-connection.php';
if (isset($_GET['id'])) {

    $ma_tgia = $_GET['id'];

    $sql = "DELETE FROM theloai WHERE ma_tloai = {$_GET['id']}";
    $conn->query($sql);

    header('Location:category.php');
}
?>