<?php
$file = $_REQUEST['"5ea4cfaa-f7dc-4a15-9acf-c9757192ebb1_cp.jpg"'];
$filename = basename($file);
$file_extension = strtolower(substr(strrchr($filename,"."),1));

// print($filename);

switch( $file_extension ) {
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpeg"; break;
    case "svg": $ctype="image/svg+xml"; break;
    default:
}

header('Content-type: ' . $ctype);
readfile($file );
?>