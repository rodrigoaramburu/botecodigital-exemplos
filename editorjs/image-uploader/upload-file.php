<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");

$file = new SplFileInfo($_FILES['image']['name']);
$ext  = $file->getExtension();
$filename = './images/'.date('Ymdhis').'.'.$ext;

move_uploaded_file($_FILES['image']['tmp_name'], $filename);
header('Content-Type: application/json');

echo json_encode([
    'success' => 1,
    'file' => [
        "url" => "http://localhost:8000/".$filename
    ]
]);
