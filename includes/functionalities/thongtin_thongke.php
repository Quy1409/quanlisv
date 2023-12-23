<!--== main-page: thanh điều hướng ==-->
<div class="container-fluid">
  <div class="row page-title-div">
    <div class="col-md-6">
      <h2 class="title">THÔNG TIN</h2>

    </div>

    <!-- /.col-md-6 text-right -->
  </div>
  <!-- /.row -->
  <div class="row breadcrumb-div">
    <div class="col-md-6">
      <ul class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i>Trang chủ</a></li>
        <li class="active">Thống kê</li>
      </ul>
    </div>

  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->

<!-- Số lượng sinh viên -->
<?php
            include('../../db_conn/db_connection.php');

            #Câu lệnh truy vấn bảng trong sql
            $spl="
              SELECT COUNT(*)
              FROM tbl_sinhvien;
            ";
            #thực hiện truy vấn
            $result=$conn->query($spl);
            if($result->num_rows > 0){
              $slsv = $result->fetch_column();
            }

            ?>
            <!-- Số lớp CN -->
            <?php
            include('../../db_conn/db_connection.php');

            #Câu lệnh truy vấn bảng trong sql
            $spl="
              SELECT COUNT(*)
              FROM tbl_lopchuyennganh;
            ";
            #thực hiện truy vấn
            $result=$conn->query($spl);
            if($result->num_rows > 0){
              $lcn = $result->fetch_column();
            }
            ?>
            <!-- Số lượng học phần -->
            <?php
            include('../../db_conn/db_connection.php');

            #Câu lệnh truy vấn bảng trong sql
            $spl="
              SELECT COUNT(*)
              FROM tbl_hocphan;
            ";
            #thực hiện truy vấn
            $result=$conn->query($spl);
            if($result->num_rows > 0){
              $hocphan = $result->fetch_column();
            }
            ?>

            <!-- Số lượng sinh viên xuất xác-->
            <?php
            include('../../db_conn/db_connection.php');

            #Câu lệnh truy vấn bảng trong sql
            $sql="
              SELECT *
              FROM tbl_diemhocphan;
            ";
            #thực hiện truy vấn
            $r = $conn->query($sql);

            $sosvxx = 0;

            while($record = $r->fetch_assoc()){
              $dhp = 0.6*$record['A'] + 0.3*$record['B'] + 0.1*$record['C'];

                if ($dhp > 8) {
                  $sosvxx++;
              }
            }
?>

<!--== main-page: nội dung ==-->
<section class="section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat bg-primary" href="#">
          <span class="number counter"><?php echo $slsv; ?></span>
          <span class="name">SINH VIÊN</span>
          <span class="bg-icon"><i class="fa fa-users"></i></span>
        </a>
        <!-- /.dashboard-stat -->
      </div>
      <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat bg-danger" href="#">
          <span class="number counter"><?php echo $hocphan; ?></span>
          <span class="name">HỌC PHẦN</span>
          <span class="bg-icon"><i class="fa fa-ticket"></i></span>
        </a>
        <!-- /.dashboard-stat -->
      </div>
      <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat bg-warning" href="#">
          <span class="number counter"><?php echo $lcn; ?></span>
          <span class="name">LỚP CHUYÊN NGHÀNH</span>
          <span class="bg-icon"><i class="fa fa-bank"></i></span>
        </a>
        <!-- /.dashboard-stat -->
      </div>
      <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat bg-success" href="#">
          <span class="number counter"><?php echo $sosvxx; ?></span>
          <span class="name">SINH VIÊN XUẤT XẮC</span>
          <span class="bg-icon"><i class="fa fa-file-text"></i></span>
        </a>
        <!-- /.dashboard-stat -->
      </div>
      <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.section -->