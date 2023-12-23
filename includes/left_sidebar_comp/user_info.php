<?php
$sv = '
<div class="user-info closed">
  <img src="img/student.jpg" alt="ERROR!" class="img-circle profile-img" width="90px" height="90px">
  <h5 class="title">SINH VIÊN</h5>
  <small class="info">Nguyễn Tiến Quý</small><br>
  <small class="info">DCCTCT66_07B</small>
</div>
';
$qtv = '
<div class="user-info closed">
  <img src="img/admin.png" alt="ERROR!" class="img-circle profile-img" width="90px" height="90px">
  <h6 class="title">QUẢN TRỊ VIÊN</h6>
  <small class="info"><< tên quản trị viên >></small><br>
</div>
';
$gv = '
<div class="user-info closed">
  <img src="img/lecturer.png" alt="ERROR!" class="img-circle profile-img" width="90px" height="90px">
  <h6 class="title">GIẢNG VIÊN</h6>
  <small class="info"><< tên giảng viên >></small><br>
  <small class="info"><< bộ môn >></small><br>
</div>
';

if(isset($_SESSION['uid']) && (trim($_SESSION['uid']) != '')){
  switch ($_SESSION['urole']) {
    case 'sv':
      echo $sv;
      break;

    case 'gv':
      echo $gv;
      break;

    default:
      echo $qtv;
      break;
  }
}else{
  echo '
  <div class="user-info closed">
    <img src="img/guest.png" alt="ERROR!" class="img-circle profile-img" width="90px" height="90px">
    <h6 class="title">KHÁCH VÃNG LAI</h6>
  </div>
  ';
}
?>