<?php
header('Content-Type: application/json; charset=utf-8');

// Lấy dữ liệu từ POST
$user = isset($_POST['username']) ? $_POST['username'] : '';
$pass = isset($_POST['password']) ? $_POST['password'] : '';

// Khởi tạo mảng kết quả
$response = array();

// Kiểm tra logic
if ($user == "admin" && $pass == "123") {
    $response['success'] = true;
} else {
    $response['success'] = false;
}

// Trả về JSON
echo json_encode($response);
?>