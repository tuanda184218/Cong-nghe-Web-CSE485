<?php
    include "../includes/database-connection.php"; //Kết nối cơ sở dữ liệu

    if(isset($_POST['btnAdd'])){ //Kiểm tra xem POST được gửi lên không

        //Lấy mã tác giả cuối cùng
        $sqlEnd = "SELECT * FROM tacgia ORDER BY ma_tgia DESC";
        $stament = $conn->query($sqlEnd);
        $index = $stament->fetch_assoc();
        $indexEnd = $index['ma_tgia'] + 1;

        //Lấy tên tác giả từ form 
        $name = $_POST['txtCatName'];

        //Chèn dữ liệu vào bảng tacgia
        $sql = "INSERT INTO tacgia (ma_tgia , ten_tgia) VALUES ('$indexEnd','$name')";
        $conn->query($sql);

        //Chuyển hướng sau khi thêm dữ liệu
        header('Location:author.php');
    }
?>