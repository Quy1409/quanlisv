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
    <!-- Add your CSS and JavaScript files here -->
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
  <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
  <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
  <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
  <link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
  <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css" />
  <link rel="stylesheet" href="css/main.css" media="screen">

</head>
<body>
    <div class="panel-body p-20">
        <?php echo getAllStudentsInfo($conn); ?>
    </div>
    <!-- Add your JavaScript files here -->
  <!-- ========== COMMON JS FILES ========== -->
  <script src="js/modernizr/modernizr.min.js"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <script src="js/jquery/jquery-2.2.4.min.js"></script>
  <script src="js/pace/pace.min.js"></script>
  <script src="js/lobipanel/lobipanel.min.js"></script>
  <script src="js/iscroll/iscroll.js"></script>
  <!-- ========== PAGE JS FILES ========== -->
  <script src="js/prism/prism.js"></script>
  <script src="js/DataTables/datatables.min.js"></script>
  <!-- ========== THEME JS ========== -->
  <script src="js/main.js"></script>
</body>
</html>
