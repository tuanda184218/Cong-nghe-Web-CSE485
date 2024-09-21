<?php
    include"../includes/database-connection.php";
    
    if(isset($_POST['save'])){

    //Lấy dữ liệu từ form 
    $ma_tloai = $_POST['txtCatId'];
    $ten_tloai = $_POST['txtCatName'];
    //Truy vấn
    $sql = "UPDATE theloai set ten_tloai = '$ten_tloai' where ma_tloai = $ma_tloai ";
    $conn->query($sql);
    
    //Chuyển hướng
    header("Location:category.php");

    }
?>
