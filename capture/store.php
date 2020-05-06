<?php

const KEEPING_FILE_DAYS = 30;

# Delete old files.
$files = glob('../data/*.{webm,jpg}', GLOB_BRACE);
$now = time();
foreach ($files as $file) {
    if (is_file($file)) {
        if ($now - filemtime($file) >= 60 * 60 * 24 * KEEPING_FILE_DAYS) {
            unlink($file);
        }
    }
}

# Create or append file.
$uploadfile = '../data/' . preg_replace('[^\w\d\s\-_\.]', '', basename($_FILES['file']['name']));
if (file_exists($uploadfile)) {
    if (file_put_contents($uploadfile, file_get_contents($_FILES["file"]["tmp_name"]), FILE_APPEND) === FALSE) {
        http_response_code(500);
        exit;
    }
} else {
    if (!move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
        http_response_code(500);
        exit;
    }
}

echo "OK";
exit;
