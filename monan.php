<?php
header('Content-Type: application/json; charset=utf-8');
$storageFile = 'data.json';

// 1. Khởi tạo dữ liệu mẫu nếu file chưa tồn tại
if (!file_exists($storageFile)) {
    $initialData = [
        ["ma" => 1, "ten" => "Pho"],
        ["ma" => 2, "ten" => "Cha ca"],
        ["ma" => 3, "ten" => "Cao lau"]
    ];
    file_put_contents($storageFile, json_encode($initialData, JSON_UNESCAPED_UNICODE));
}

// Đọc dữ liệu hiện tại từ file
$currentData = json_decode(file_get_contents($storageFile), true);

// 2. Lấy các tham số từ phương thức GET
$action = $_GET['action'] ?? '';
$mssv   = $_GET['mssv'] ?? '';

// Kiểm tra MSSV (luôn phải có theo yêu cầu đề bài)
if (empty($mssv)) {
    echo json_encode(["error" => "Thieu tham so mssv"]);
    exit;
}

// 3. Xử lý các hành động
switch ($action) {
    
    // LẤY TẤT CẢ MÓN ĂN
    case 'getallmonan':
        echo json_encode($currentData, JSON_UNESCAPED_UNICODE);
        break;

    // THÊM MỘT MÓN ĂN
    case 'addsinglemon':
        $tenmon = $_GET['tenmon'] ?? '';
        if (!empty($tenmon)) {
            // Lấy ID lớn nhất hiện tại cộng thêm 1
            $lastItem = end($currentData);
            $newId = ($lastItem) ? $lastItem['ma'] + 1 : 1;
            
            $newEntry = ["ma" => $newId, "ten" => $tenmon];
            $currentData[] = $newEntry; 
            
            // Lưu lại vào file JSON
            file_put_contents($storageFile, json_encode($currentData, JSON_UNESCAPED_UNICODE));
            
            echo json_encode(["message" => (string)$newId]);
        } else {
            echo json_encode(["message" => "0"]); // Thêm thất bại
        }
        break;

    // XÓA MỘT MÓN ĂN
    case 'delete':
        $idmonan = isset($_GET['idmonan']) ? (int)$_GET['idmonan'] : -1;
        $isDeleted = false;

        // Tìm và xóa phần tử
        foreach ($currentData as $key => $item) {
            if ($item['ma'] === $idmonan) {
                unset($currentData[$key]);
                $isDeleted = true;
                break;
            }
        }

        if ($isDeleted) {
            // Reset lại chỉ số mảng và lưu vào file
            $currentData = array_values($currentData);
            file_put_contents($storageFile, json_encode($currentData, JSON_UNESCAPED_UNICODE));
            echo json_encode(["message" => "Xoa thanh cong"]);
        } else {
            echo json_encode(["error" => "Khong tim thay ma mon an: $idmonan"]);
        }
        break;

    default:
        echo json_encode(["error" => "Hanh dong khong hop le"]);
        break;
}