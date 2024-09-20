<?php
    include"../includes/database-connection.php";
    
    if(isset($_POST['save'])){

    //Lấy dữ liệu từ form 
    $ma_tgia = $_POST['txtCatId'];
    $ten_tgia = $_POST['txtCatName'];
    //Truy vấn
    $sql = "UPDATE tacgia set ten_tgia = '$ten_tgia' where ma_tgia = $ma_tgia ";
    $conn->query($sql);
    
    //Chuyển hướng
    header("Location:author.php");

    }
?>