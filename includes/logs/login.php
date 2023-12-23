<?php
include('../../db_conn/db_connection.php');

session_start();

#-- lấy thông tin đăng nhập --
$uid = $_POST['uid'];
$upwd = $_POST['upwd'];

#-- kiểm tra xác thực tài khoản --
$sql = "
  SELECT * 
  FROM users
  WHERE uid='" . $uid . "' AND upwd='" . md5($upwd) . "';";

$result= $conn->query($sql);
if($result->num_rows > 0){
  $loguser = $result->fetch_assoc();

  $_SESSION['uid'] = $loguser['uid'];
  $_SESSION['urole'] = $loguser['urole'];  
}

header('location: ../../index.php');
?>