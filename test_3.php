<?php
include('db_conn/db_connection.php');

function getAllStudentsInfo($conn) {
    $output = '<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th colspan="7">Thông tin sinh viên và điểm học phần</th>
        </tr>
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ và tên</th>
            <th>Môn học</th>
            <th>Tên môn học</th>
            <th>C</th>
            <th>B</th>
            <th>A</th>
        </tr>
    </thead>
    <tbody>';

$sql = "SELECT sv.msv, sv.holot, sv.ten, dh.mhp, hp.tenhocphan, dh.A, dh.B, dh.C
FROM tbl_sinhvien sv
LEFT JOIN tbl_diemhocphan dh ON sv.msv = dh.msv
LEFT JOIN tbl_hocphan hp ON dh.mhp = hp.mhp";
$result = $conn->query($sql);

$currentStudent = null;

while ($row = $result->fetch_assoc()) {
$msv = $row['msv'];
$studentName = $row['holot'] . ' ' . $row['ten'];
$mhp = $row['mhp'];
$tenHocPhan = $row['tenhocphan'];
$c = $row['C'];
$b = $row['B'];
$a = $row['A'];

if ($currentStudent !== $msv) {
// Start a new row for a new student
$output .= "<tr>
            <td>{$msv}</td>
            <td>{$studentName}</td>";
$currentStudent = $msv;
} else {
// Empty cells for repeated student info
$output .= "<tr>
            <td></td>
            <td></td>";
}

// Display subject and grades
$output .= "<td>{$mhp}</td>
        <td>{$tenHocPhan}</td>
        <td>{$c}</td>
        <td>{$b}</td>
        <td>{$a}</td>
    </tr>";
}

$output .= '</tbody></table>';
    return $output;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <!-- ... (Thêm các liên kết CSS khác) -->
</head>
<body>
    <div class="panel-body p-20">
        <div class="search-container">
            <label for="search">Tìm kiếm:</label>
            <input type="text" id="search" onkeyup="searchTable()" placeholder="Nhập mã hoặc tên sinh viên...">
        </div>
        <?php echo getAllStudentsInfo($conn); ?>
    </div>

    <script src="js/modernizr/modernizr.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>
    <script src="js/prism/prism.js"></script>
    <script src="js/DataTables/datatables.min.js"></script>

 <script>
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementsByTagName("table")[0];
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            var foundMsv = false; // Kiểm soát xem dòng có chứa từ khóa tìm kiếm trong cột mã sinh viên không
            var foundName = false; // Kiểm soát xem dòng có chứa từ khóa tìm kiếm trong cột tên sinh viên không

            // Lặp qua cột mã sinh viên
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    foundMsv = true;
                }
            }

            // Lặp qua cột tên sinh viên
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    foundName = true;
                }
            }

            // Hiển thị dòng nếu tìm thấy từ khóa trong cột mã sinh viên hoặc tên sinh viên
            tr[i].style.display = foundMsv || foundName ? "" : "none";
        }
    }
</script>


    <script src="js/main.js"></script>
</body>
</html>