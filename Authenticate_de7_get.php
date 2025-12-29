<?php
header('Content-Type: application/json');

// Kiểm tra xem phương thức có phải là POST không
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    // Lấy dữ liệu từ POST (Lưu ý: Phân biệt hoa/thường theo yêu cầu)
    $id = isset($_GET['ID']) ? $_GET['ID'] : '';
    $passcode = isset($_GET['PASSCODE']) ? $_GET['PASSCODE'] : '';

    // Kiểm tra thông tin đăng nhập
    if ($id === 'VVIP7' && $passcode === 'Zeus') {
        // Đăng nhập thành công
        echo json_encode(["RESULT" => "1"]);
    } else {
        // Đăng nhập thất bại
        echo json_encode(["RESULT" => "0"]);
    }
}
?>