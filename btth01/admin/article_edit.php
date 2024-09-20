<?php 
    include('../includes/header.php');
    include('../includes/nav.php');
    include('../includes/database-connection.php'); // Kết nối tới database

    // Lấy thông tin bài viết theo id
    if (isset($_GET['id'])) {
        $ma_bviet = $_GET['id'];

        // Lấy dữ liệu bài viết từ database
        $sql = "SELECT * FROM baiviet WHERE ma_bviet = '$ma_bviet'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "<div class='alert alert-danger'>Không tìm thấy bài viết.</div>";
            exit;
        }
    }

    // Xử lý khi form được submit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tieude = $_POST['tieude'];
        $ten_bhat = $_POST['ten_bhat'];
        $ma_tloai = $_POST['ma_tloai'];
        $tomtat = $_POST['tomtat'];
        $noidung = $_POST['noidung'];
        $ma_tgia = $_POST['ma_tgia'];
        $ngayviet = $_POST['ngayviet'];
        $hinhanh = $_FILES['hinhanh']['name'];

        // Nếu không upload ảnh mới, giữ nguyên ảnh cũ
        if (empty($hinhanh)) {
            $hinhanh = $row['hinhanh'];
        } else {
            // Đường dẫn để lưu hình ảnh
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
            move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);
        }

        // Cập nhật dữ liệu vào cơ sở dữ liệu
        $sql_update = "UPDATE baiviet SET 
                        tieude = '$tieude', 
                        ten_bhat = '$ten_bhat', 
                        ma_tloai = '$ma_tloai', 
                        tomtat = '$tomtat', 
                        noidung = '$noidung', 
                        ma_tgia = '$ma_tgia', 
                        ngayviet = '$ngayviet', 
                        hinhanh = '$hinhanh'
                      WHERE ma_bviet = '$ma_bviet'";

        if ($conn->query($sql_update) === TRUE) {
            echo "<div class='alert alert-success'>Bài viết đã được cập nhật thành công!</div>";
        } else {
            echo "<div class='alert alert-danger'>Lỗi: " . $conn->error . "</div>";
        }
    }
?>

<main>
    <div class="wrapper container p-4">
        <h1>Chỉnh sửa bài viết</h1>
        <form action="edit_article.php?id=<?php echo $ma_bviet; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="tieude" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="tieude" name="tieude" value="<?php echo htmlspecialchars($row['tieude']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="ten_bhat" class="form-label">Tên bài hát</label>
                <input type="text" class="form-control" id="ten_bhat" name="ten_bhat" value="<?php echo htmlspecialchars($row['ten_bhat']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="ma_tloai" class="form-label">Thể loại</label>
                <input type="text" class="form-control" id="ma_tloai" name="ma_tloai" value="<?php echo htmlspecialchars($row['ma_tloai']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="tomtat" class="form-label">Tóm tắt</label>
                <textarea class="form-control" id="tomtat" name="tomtat" rows="3" required><?php echo htmlspecialchars($row['tomtat']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="noidung" class="form-label">Nội dung</label>
                <textarea class="form-control" id="noidung" name="noidung" rows="5" required><?php echo htmlspecialchars($row['noidung']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="ma_tgia" class="form-label">Tác giả</label>
                <input type="text" class="form-control" id="ma_tgia" name="ma_tgia" value="<?php echo htmlspecialchars($row['ma_tgia']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="ngayviet" class="form-label">Ngày viết</label>
                <input type="date" class="form-control" id="ngayviet" name="ngayviet" value="<?php echo htmlspecialchars($row['ngayviet']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="hinhanh" class="form-label">Hình ảnh hiện tại</label>
                <img src="../uploads/<?php echo htmlspecialchars($row['hinhanh']); ?>" class="img-thumbnail mb-3" width="200">
                <input type="file" class="form-control" id="hinhanh" name="hinhanh">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật bài viết</button>
        </form>
    </div>
</main>

<?php 
    include('../includes/footer.php');
?>
