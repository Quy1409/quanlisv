<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>-- HỆ THỐNG QUẢN LÍ ĐIỂM SINH VIÊN --</title>

  <!-- favico -->
  <link rel="icon" type="image/x-icon" href="img/it-humg-favicon.ico">

  <!-- css -->
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
  <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
  <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
  <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
  <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen">
  <link rel="stylesheet" href="css/icheck/skins/line/blue.css">
  <link rel="stylesheet" href="css/icheck/skins/line/red.css">
  <link rel="stylesheet" href="css/icheck/skins/line/green.css">
  <link rel="stylesheet" href="css/main.css" media="screen">

</head>
<body class="top-navbar-fixed">
  <!-- html -->
  <div class="main-wrapper">
    <?php include('includes/admin_ui/admin_nav_bar_1.php'); ?>

    <div class="content-wrapper">
      <div class="content-container">
        <?php include('includes/admin_ui/admin_left_sidebar.php'); ?>
        <div class="main-page">
           <!--== main-page: thanh điều hướng ==-->
           <div class="container-fluid">
  <div class="row page-title-div">
    <div class="col-md-6">
      <h2 class="title">Quản lí</h2>
    </div>

    <!-- /.col-md-6 text-right -->
  </div>
  <!-- /.row -->
  <div class="row breadcrumb-div">
    <div class="col-md-6">
      <ul class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i>Trang chủ</a></li>
        <li class="active">Quản lí sinh viên</li>
        <li class="active">Cập nhập học phần</li>
      </ul>
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php
include('db_conn/db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- css -->
  <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
  <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
  <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
  <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
  <link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
  <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css" />
  <link rel="stylesheet" href="css/main.css" media="screen">

  <style>
    .errorWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #dd3d36;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }

    .succWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #5cb85c;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }
  </style>
</head>

<body>
  <section class="section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title">
                <h5>DANH SÁCH HỌC PHẦN</h5>
              </div>
            </div>
            <div class="panel-body p-20">
              <table id="dshp" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Mã học phần</th>
                    <th>Tên học phần</th>
                    <th>Số tín chỉ</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- hiển thị kết quả truy vấn ở đây -->
                  <?php
                  #-- câu lệnh SQL -->
                  $sql = "
                    SELECT *
                    FROM tbl_hocphan
                  ";

                  #-- truy vấn dữ liệu -->
                  $query = $conn->query($sql);
                  $count = 1;
                  if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                      
                  ?>

                      <tr>
                        <td><?php echo htmlentities($count); ?></td>
                        <td><?php echo htmlentities($row['mhp']); ?></td>
                        <td><?php echo htmlentities($row['tenhocphan']); ?></td>
                        <td><?php echo htmlentities($row['tinch']); ?></td>
                        <td>
                          <a href="#" id="edit-<?php echo htmlentities($count); ?>"><i class="fa fa-edit" title="Sửa"></i></a>
                          &nbsp; | &nbsp;
                          <a href="#" id="delete-<?php echo htmlentities($count); ?>"><i class="fa fa-trash" title="Xóa"></i></a>
                        </td>
                        
                      </tr>

                  <?php
                      $count = $count + 1;
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.section -->


  <!-- js -->
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
  <script>
      function loadContent(url) {
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", url);
        xhttp.send();
        xhttp.onreadystatechange = (e) => {
          document.getElementById("main-page").innerHTML = xhttp.responseText;
        }
      }
    </script>
  <script src="js/main.js"></script>
  <script>
    $(function($) {
      $('#dshp').DataTable({
        language: {
          info: 'Trang số _PAGE_!',
          lengthMenu: 'Hiển thị _MENU_ kết quả trên một trang.',
          search: 'Tìm kiếm: ',
          infoFiltered: '',
          paginate: {
            next: "Trang sau",
            previous: "Trang trước",
          }
        }
      });
    });
  </script>
  
</body>

</html>
</div>
      </div>
    </div>
  </div>