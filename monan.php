<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

// Khởi tạo dữ liệu giả ban đầu nếu chưa có trong session
if (!isset($_SESSION['data_monan'])) {
    $_SESSION['data_monan'] = [
        ["ma" => 1, "ten" => "Pho"],
        ["ma" => 2, "ten" => "Cha ca"],
        ["ma" => 3, "ten" => "Cao lau"]
    ];
}

// Lấy các tham số từ URL (GET)
$action = isset($_GET['action']) ? $_GET['action'] : '';
$mssv   = isset($_GET['mssv']) ? $_GET['mssv'] : '';

// Kiểm tra MSSV (Giả sử MSSV không được để trống)
if (empty($mssv)) {
    echo json_encode(["error" => "Thieu tham so mssv"]);
    exit;
}

// Xử lý các chức năng theo yêu cầu đề thi
switch ($action) {
    
    // 1. LẤY DANH SÁCH MÓN ĂN
    case 'getallmonan':
        echo json_encode($_SESSION['data_monan']);
        break;

    // 2. THÊM MỘT MÓN ĂN
    case 'addsinglemon':
        $tenmon = isset($_GET['tenmon']) ? $_GET['tenmon'] : '';
        if (!empty($tenmon)) {
            // Tạo ID tự động tăng
            $new_id = end($_SESSION['data_monan'])['ma'] + 1;
            $_SESSION['data_monan'][] = ["ma" => $new_id, "ten" => $tenmon];
            
            // Trả về theo mẫu: {"message":"80"}
            echo json_encode(["message" => (string)$new_id]);
        } else {
            echo json_encode(["message" => "0"]); // Thêm thất bại
        }
        break;

    // 3. XÓA MỘT MÓN ĂN
    case 'delete':
        $idmonan = isset($_GET['idmonan']) ? (int)$_GET['idmonan'] : 0;
        $found = false;

        foreach ($_SESSION['data_monan'] as $key => $monan) {
            if ($monan['ma'] === $idmonan) {
                unset($_SESSION['data_monan'][$key]);
                $_SESSION['data_monan'] = array_values($_SESSION['data_monan']); // Reset index mảng
                $found = true;
                break;
            }
        }

        if ($found) {
            echo json_encode(["message" => "Xoa thanh cong"]);
        } else {
            echo json_encode(["error" => "Khong tim thay mon an de xoa"]);
        }
        break;

    default:
        echo json_encode(["error" => "Hanh dong (action) khong hop le"]);
        break;
}
?>