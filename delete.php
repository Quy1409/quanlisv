<?php
include('db_conn/db_connection.php');

if (isset($_GET['msv'])) {
    $id = $_GET['msv'];
    // Xóa bản ghi từ cơ sở dữ liệu dựa trên msv
    $sql = "DELETE FROM tbl_sinhvien WHERE id = $msv";
    $conn->query($sql);
    // Chuyển hướng về trang chính sau khi xóa
    header("Location: index.php");
    exit();
}
?>