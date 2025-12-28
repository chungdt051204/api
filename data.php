<?php
// Thiết lập header để trình duyệt hiểu đây là dữ liệu JSON
header('Content-Type: application/json; charset=utf-8');

// Tạo mảng dữ liệu giả
$data = [
    "SACH" => [
        [
            "MA_SACH" => "S001",
            "TEN_SACH" => "Lập trình PHP cơ bản",
            "GIA_BAN" => 150000,
            "NHA_XUAT_BAN" => "NXB Giáo Dục"
        ],
        [
            "MA_SACH" => "S002",
            "TEN_SACH" => "Làm chủ Render và GitHub",
            "GIA_BAN" => 220000,
            "NHA_XUAT_BAN" => "NXB Công Nghệ"
        ],
        [
            "MA_SACH" => "S003",
            "TEN_SACH" => "Dữ liệu JSON cho người mới",
            "GIA_BAN" => 185000,
            "NHA_XUAT_BAN" => "NXB Trẻ"
        ],
        [
            "MA_SACH" => "S004",
            "TEN_SACH" => "Kỹ thuật Deploy Web",
            "GIA_BAN" => 300000,
            "NHA_XUAT_BAN" => "NXB Thông Tin"
        ]
    ]
];

// Xuất dữ liệu ra định dạng JSON
echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>