<?php
session_start();
header("Content-Type: application/json");
require_once(__DIR__ . '/db.php');
$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
// set the PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$type = @$_GET['type'];
if ($type == 'create') {
  $name = @$_POST['instance'];
  $desc = @$_POST['description'];
  if ($name != '' && $desc != '') {
    // pdo insert query 
    $sql = 'INSERT INTO crud(name,description,user_id) VALUES(?,?,?)';

    $statement = $pdo->prepare($sql);
    try {
      $pdo->beginTransaction();
      $statement->execute([
        $name, $desc, $_SESSION['id']
      ]);
      $pdo->commit();
      $response = [
        'status' => 'success',
        'message' => 'Success insert data.!'
      ];
    } catch (\Throwable $th) {
      // back query failed insert
      $pdo->rollback();
      $response = [
        'status' => 'warning',
        'message' => $th->getMessage()
      ];
      http_response_code(302);
    }
  } else {
    $response = [
      'status' => 'errors',
      'message' => 'Failed insert data.!'
    ];
    http_response_code(403);
  }
} else if ($type == 'delete') {
  $sql = 'DELETE from crud where `id` = ?';
  $statement = $pdo->prepare($sql);
  try {
    $pdo->beginTransaction();
    $statement->execute(
      [$_POST['id']]
    );
    $pdo->commit();
    $response = [
      'status' => 'success',
      'message' => 'Success delete data.!'
    ];
    http_response_code(302);
  } catch (\Throwable $th) {
    $response = [
      'status' => 'errors',
      'message' => 'Failed delete data.!'
    ];
    http_response_code(403);
  }
  // $response = $_POST['id'];
}
echo json_encode($response);
