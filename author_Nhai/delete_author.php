<?php
require '../includes/database-connection.php';
if (isset($_GET['id'])) {

    $ma_tgia = $_GET['id'];

    $sql = "DELETE FROM tacgia WHERE ma_tgia = {$_GET['id']}";
    $conn->query($sql);

    header('Location:author.php');
}
?>