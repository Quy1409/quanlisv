<?php
include('../includes/logs/log_user.php');

session_start();

#-- thiết lập các biến session quản trị viên --
$admin = new LogUser('admin','Quản Trị Viên','qtv');
$_SESSION['uid'] = $admin->uid_;
$_SESSION['uname'] = $admin->uname_;
$_SESSION['urole'] = $admin->urole_;

/*
#-- thiết lập các biến session sinh viên --
$sinhvien = new LogUser('2024070801', 'Nguyễn Văn A', 'sv');
$_SESSION['uid'] = $admin->uid_;
$_SESSION['uname'] = $admin->uname_;
$_SESSION['urole'] = $admin->urole_;

#-- thiết lập các biến session giảng viên --
$giangvien = new LogUser('0803-12', 'Trần Trường Giang', 'gv');
$_SESSION['uid'] = $admin->uid_;
$_SESSION['uname'] = $admin->uname_;
$_SESSION['urole'] = $admin->urole_;
*/
?>