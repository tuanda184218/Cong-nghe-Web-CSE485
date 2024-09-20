<?php
    include "../db.php"; //Kết nối cơ sở dữ liệu

    if(isset($_POST['btnAdd'])){ //Kiểm tra xem POST được gửi lên không

        //Lấy mã tác giả cuối cùng
        $sqlEnd = "SELECT * FROM theloai ORDER BY ma_tloai DESC";
        $stament = $conn->query($sqlEnd);
        $index = $stament->fetch_assoc();
        $indexEnd = $index['ma_tloai'] + 1;

        //Lấy tên tác giả từ form 
        $name = $_POST['txtCatName'];

        //Chèn dữ liệu vào bảng tacgia
        $sql = "INSERT INTO theloai (ma_tloai , ten_tloai) VALUES ('$indexEnd','$name')";
        $conn->query($sql);

        //Chuyển hướng sau khi thêm dữ liệu
        header('Location:category.php');
    }
?>