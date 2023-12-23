<!DOCTYPE html>
<html lang="en">

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
        <li class="active">Thêm mới học phần</li>
      </ul>
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
          <?php
  include('db_conn/db_connection.php');
  $msg = FALSE;
  $error = FALSE;

  if(isset($_POST['submit'])){
    $insert="
      INSERT INTO tbl_hocphan
      VALUES('" . $_POST['mhp'] . "','" . $_POST['tenhocphan'] . "','" . $_POST['tinch'] . "');
    ";
  $query=$conn->query($insert);
  if($query===TRUE){
    $msg = TRUE;
  }else{
    $error = TRUE;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>

  <!-- css -->
  <link rel="stylesheet" href="../../css/bootstrap.css" media="screen">
  <link rel="stylesheet" href="../../css/font-awesome.min.css" media="screen">
  <link rel="stylesheet" href="../../css/animate-css/animate.min.css" media="screen">
  <link rel="stylesheet" href="../../css/lobipanel/lobipanel.min.css" media="screen">
  <link rel="stylesheet" href="../../css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
  <link rel="stylesheet" href="../../css/main.css" media="screen">
  <script src="js/modernizr/modernizr.min.js"></script>
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
        <div class="col-md-8 col-md-offset-2">
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title">
                <h4>Thêm học phần mới</h4>
              </div>
            </div>
            <div class="panel-body">
              <form method="post">
                <!-- nhập thông tin -->
                <div class="form-group has-success">
                  <label for="success" class="control-label">Mã học phần: </label>
                  <div class="">
                    <input type="text" name="mhp" class="form-control" required="required" id="success">
                    <span class="help-block">Lưu ý: Mã học phần có 7 kí tự.</span>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label for="success" class="control-label">Tên học phần: </label></label>
                  <div class="">
                    <input type="text" name="tenhocphan" required="required" class="form-control" id="success">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label for="success" class="control-label">Số tín chỉ: </label>
                  <div class="">
                    <input type="text" name="tinch" required="required" class="form-control" id="success">
                    <span class="help-block"></span>
                  </div>
                </div>
                
                <!-- gửi thông tin sang phía máy chủ -->
                <div class="form-group has-success">
                  <div class="">
                    <button type="submit" name="submit" class="btn btn-success btn-labeled">Thêm mới<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                  </div>
                </div>
              </form>
<?php
if($msg===TRUE){
?>
              <div class="alert alert-success left-icon-alert" role="alert">
                <strong>THÊM MỚI THÀNH CÔNG!</strong>
              </div>
<?php  
}elseif($error===TRUE){
?>
              <div class="alert alert-danger left-icon-alert" role="alert">
                <strong>THÊM MỚI THẤT BẠI!</strong>
              </div>
<?php
}
?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
        </div>
      </div>
  </div>



  <!-- js lib -->
  <script src="js/modernizr/modernizr.min.js"></script>

  <script src="js/jquery/jquery-2.2.4.min.js"></script>
  <script src="js/jquery-ui/jquery-ui.min.js"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <script src="js/pace/pace.min.js"></script>
  <script src="js/lobipanel/lobipanel.min.js"></script>
  <script src="js/iscroll/iscroll.js"></script>

  <script src="js/prism/prism.js"></script>
  <script src="js/waypoint/waypoints.min.js"></script>
  <script src="js/counterUp/jquery.counterup.min.js"></script>
  <script src="js/amcharts/amcharts.js"></script>
  <script src="js/amcharts/serial.js"></script>
  <script src="js/amcharts/plugins/export/export.min.js"></script>
  <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
  <script src="js/amcharts/themes/light.js"></script>
  <script src="js/toastr/toastr.min.js"></script>
  <script src="js/icheck/icheck.min.js"></script>

  <script src="js/main.js"></script>
  <script src="js/production-chart.js"></script>
  <script src="js/traffic-chart.js"></script>
  <script src="js/task-list.js"></script>
  
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
</body>

</html>