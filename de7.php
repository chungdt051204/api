<?php
// Thiết lập header để trình duyệt/client hiểu đây là dữ liệu JSON
header('Content-Type: application/json; charset=utf-8');

// Khởi tạo mảng dữ liệu theo đúng cấu trúc trong ảnh
$data = [
    "DS_TRAM_SAC" => [
        [
            "TEN_TRAM" => "Trạm EV01",
            "SO_CONG_SAC" => "5",
            "HOAT_DONG" => "TRUE"
        ],
        [
            "TEN_TRAM" => "Trạm EV02",
            "SO_CONG_SAC" => "8",
            "HOAT_DONG" => "TRUE"
        ]
    ]
];

// Chuyển đổi mảng thành chuỗi JSON và xuất ra màn hình
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>