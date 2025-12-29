<?php
header('Content-Type: application/json');

// Kiểm tra xem phương thức có phải là POST không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Lấy dữ liệu từ POST (Lưu ý: Phân biệt hoa/thường theo yêu cầu)
    $id = isset($_POST['ID']) ? $_POST['ID'] : '';
    $passcode = isset($_POST['PASSCODE']) ? $_POST['PASSCODE'] : '';

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