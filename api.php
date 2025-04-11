<?php
// CORSヘッダーを設定
header("Access-Control-Allow-Origin: *");

// 画像フォルダのパス
$imageFolder = './images';

// フォルダ内の画像ファイルを取得
$imageFiles = array_filter(scandir($imageFolder), function ($file) use ($imageFolder) {
    return is_file($imageFolder . '/' . $file) && preg_match('/\.(jpg|jpeg|png|gif)$/i', $file);
});

// 画像URLを生成
$index = array_rand($imageFiles);
$image = $imageFolder . '/' . $imageFiles[$index];

// JSONレスポンスを作成
$response = [
    "message" => $image
];

// ヘッダーを設定してJSONを出力
header('Content-Type: application/json');
echo json_encode($response, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);