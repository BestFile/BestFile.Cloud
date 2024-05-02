<?php
include 'vars.php';
$randomname = basename($_GET['file']);
$filename = basename($_GET['name']);
$filepath = $tmp . $randomname;

if (file_exists($filepath)) {
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"" . $filename . "\"");
    readfile($filepath);
    die();
}
else {
    http_response_code(404);
    echo "File not found.";
    die();
}