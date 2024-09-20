<?php 
    include('../includes/header.php');
    include('../includes/nav.php');
    include('../includes/database-connection.php'); // Kết nối tới database

    // Xử lý khi form được submit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tieude = $_POST['tieude'];
        $ten_bhat = $_POST['ten_bhat'];
        $ma_tloai = $_POST['ma_tloai'];
        $tomtat = $_POST['tomtat'];
        $noidung = $_POST['noidung'];
        $ma_tgia = $_POST['ma_tgia'];
        $ngayviet = $_POST['ngayviet'];
        $hinhanh = $_POST['hinhanh']; // Sử dụng link URL

        // Thêm dữ liệu vào cơ sở dữ liệu
        $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) 
                VALUES ('$tieude', '$ten_bhat', '$ma_tloai', '$tomtat', '$noidung', '$ma_tgia', '$ngayviet', '$hinhanh')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Bài viết đã được thêm thành công!</div>";
        } else {
            echo "<div class='alert alert-danger'>Lỗi: " . $sql . "<br>" . $conn->error . "</div>";
        }

        $conn->close();
    }

    // Fetch list of authors and categories from the database
    $authors = $conn->query("SELECT ma_tgia, ten_tgia FROM tacgia");
    $categories = $conn->query("SELECT ma_tloai, ten_tloai FROM theloai");
?>

<main>
    <div class="wrapper container p-4">
        <h1>Thêm Bài Viết Mới</h1>
        <form action="article_add.php" method="POST">
            <div class="mb-3">
                <label for="tieude" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="tieude" name="tieude" required>
            </div>
            <div class="mb-3">
                <label for="ten_bhat" class="form-label">Tên bài hát</label>
                <input type="text" class="form-control" id="ten_bhat" name="ten_bhat" required>
            </div>
            <div class="mb-3">
                <label for="ma_tloai" class="form-label">Thể loại</label>
                <select class="form-control" id="ma_tloai" name="ma_tloai" required>
                    <?php while ($row = $categories->fetch_assoc()): ?>
                        <option value="<?= $row['ma_tloai'] ?>"><?= htmlspecialchars($row['ten_tloai']) ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tomtat" class="form-label">Tóm tắt</label>
                <textarea class="form-control" id="tomtat" name="tomtat" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="noidung" class="form-label">Nội dung</label>
                <textarea class="form-control" id="noidung" name="noidung" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="ma_tgia" class="form-label">Tác giả</label>
                <select class="form-control" id="ma_tgia" name="ma_tgia" required>
                    <?php while ($row = $authors->fetch_assoc()): ?>
                        <option value="<?= $row['ma_tgia'] ?>"><?= htmlspecialchars($row['ten_tgia']) ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="ngayviet" class="form-label">Ngày viết</label>
                <input type="date" class="form-control" id="ngayviet" name="ngayviet" required>
            </div>
            <div class="mb-3">
                <label for="hinhanh" class="form-label">Link hình ảnh</label>
                <input type="url" class="form-control" id="hinhanh" name="hinhanh" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm bài viết</button>
        </form>
    </div>
</main>

<?php 
    include('../includes/footer.php');
?>
