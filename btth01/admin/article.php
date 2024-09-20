<?php 
    include('../includes/header.php');
    include('../includes/nav.php');
    include('../includes/database-connection.php'); // Kết nối tới database
?>

<main>
    <div class="wrapper container p-4">
       <a href = 'article_add.php'>
         <button type="button" class="btn btn-primary" data-bs-toggle="modal">
             Thêm bài viết
         </button>
       </a>

        <!-- Bảng hiển thị dữ liệu với tính năng responsive -->
        <div class="table-responsive mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Mã bài viết</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Tên bài hát</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Tóm tắt</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Ngày viết</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Thao tác</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM baiviet";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Duyệt qua từng hàng dữ liệu
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['ma_bviet']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['tieude']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['ten_bhat']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['ma_tloai']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['tomtat']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['noidung']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['ma_tgia']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['ngayviet']) . '</td>';
                                echo '<td><img src="' . htmlspecialchars($row['hinhanh']) . '" class="img-thumbnail" style = "height: 200px"  /></td>';
                                echo '<td>'; // Sử dụng d-flex để các nút nằm ngang
                                echo '<div class="d-flex">';
                                echo '<a href="edit_article.php?id=' . $row['ma_bviet'] . '" class="btn btn-warning btn-sm me-2"><i class="fas fa-edit"></i> Sửa</a>'; // Icon sửa
                                echo '<a href="delete_article.php?id=' . $row['ma_bviet'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Bạn có chắc chắn muốn xóa không?\')"><i class="fas fa-trash"></i> Xóa</a>'; // Icon xóa
                                echo '</div>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="10">Không có dữ liệu</td></tr>';
                        }

                        // Đóng kết nối
                        $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php 
    include('../includes/footer.php');
?>
