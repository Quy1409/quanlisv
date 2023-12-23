<?php
include('db_conn/db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Lấy chi tiết bản ghi từ cơ sở dữ liệu dựa trên ID
    $sql = "SELECT * FROM tbl_sinhvien WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    // ... Tiếp tục với biểu mẫu HTML để chỉnh sửa
}
?>