<?php
header("Content-Type: application/json");
session_start();
require_once(__DIR__ . '/db.php');

$type = @$_GET['type'];
if ($type == 'logout') {
  session_destroy();
  unset($_SESSION['id']);
  $respone = [
    'status' => 'success',
    'message' => 'Waiting for close system.!',
  ];
} else {

  $emailaddress       = $_POST['email'];
  $password           = $_POST['password'];
  if ($emailaddress != '' || $password != '') {
    $CekData = mysqli_query($conn, "select * from users where email='" . $emailaddress . "' and status='1'");
    $Data   = mysqli_fetch_array($CekData);
    if ($Data['password'] === md5($password)) {
      if ($Data['status'] == 1) {

        $_SESSION['id']               = $Data['id'];
        $_SESSION['LogIn']    = true;
        $respone = [
          'status' => 'success ',
          'message' => ('Waiting for system.!')
        ];
        http_response_code(200);
      } else {
        $respone = [
          'status' => 'errors ',
          'message' => ('Your status account non active.!')
        ];
        http_response_code(203);
      }
    }
  } else {
    $respone = [
      'status' => 'errors ',
      'message' => ('email and password required.!')
    ];
    http_response_code(403);
  }
}
echo json_encode($respone);
