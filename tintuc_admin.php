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
      <h2 class="title">THÔNG TIN</h2>
    </div>

    <!-- /.col-md-6 text-right -->
  </div>
  <!-- /.row -->
  <div class="row breadcrumb-div">
    <div class="col-md-6">
      <ul class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i>Trang chủ</a></li>
        <li class="active">Tin tức</li>
      </ul>
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
        </div>
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