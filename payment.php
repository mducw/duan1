<?php
$gio_hang_all = select_gio_hang_by_id($id_khach_hang);
if(isset($_GET['id-don-hang'])){
    $id_don_hang = $_GET['id-don-hang'];
    $tong_gia = tong_tien($id_don_hang);
    $tong_gia_tien =  $tong_gia['tong_gia_tien']; 
}
$config = [
    "app_id" => 2553,
    "key1" => "PcY4iZIKFCIdgZvA6ueMcMHHUbRLYjPL",
    "key2" => "kLtgPl8HHhfvMuDHPwKfgfsY4Ydm9eIz",
    "endpoint" => "https://sb-openapi.zalopay.vn/v2/create"
];
$embeddata = json_encode(['redirectUrl' => 'http://localhost/CookyFood/index.php?act=complete&id_don_hang='.$id_don_hang.'']); // Merchant's data

// Tạo mảng items với đúng cấu trúc JSON yêu cầu
$itemsArray = [];

foreach ($gio_hang_all as $san_pham) {
    $itemsArray[] = [
        'itemid' => $san_pham['ma_san_pham'], // mã sản phẩm
        'itemname' => $san_pham['ten_san_pham'], // tên sản phẩm (ZaloPay yêu cầu 'itemname')
        'itemprice' => $san_pham['gia_san_pham'], // giá sản phẩm
        'itemquantity' => $san_pham['so_luong'], // số lượng sản phẩm
    ];
}

// Chuyển mảng items thành chuỗi JSON
$items = json_encode($itemsArray);

$transID = rand(0, 1000000); //Random trans id
$order = [
    "app_id" => $config["app_id"],
    "app_time" => round(microtime(true) * 1000), // milliseconds
    "app_trans_id" => date("ymd") . "_" . $transID, 
    "app_user" => "user123",
    "item" => $items, // JSON Array String
    "embed_data" => $embeddata,
    "amount" => $tong_gia_tien,
    "description" => "Cooky - Payment for the order #$transID",
    "bank_code" => "",
];

// appid|app_trans_id|appuser|amount|apptime|embeddata|item
$data = $order["app_id"] . "|" . $order["app_trans_id"] . "|" . $order["app_user"] . "|" . $order["amount"]
    . "|" . $order["app_time"] . "|" . $order["embed_data"] . "|" . $order["item"];
$order["mac"] = hash_hmac("sha256", $data, $config["key1"]);

$context = stream_context_create([
    "http" => [
        "header" => "Content-type: application/x-www-form-urlencoded\r\n",
        "method" => "POST",
        "content" => http_build_query($order)
    ]
]);

$resp = file_get_contents($config["endpoint"], false, $context);
$result = json_decode($resp, true);

if ($result['return_code'] == 1) {
    header("Location:". $result['order_url']);
    exit();
}

foreach ($result as $key => $value) {
    echo "$key: $value<br>";
}
