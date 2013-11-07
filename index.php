<?php
/*
* Force Download File
* autor: Borislav [at] bborisov.me
* copyright: GNU License
* date: 07/11/2013
*/

$filePath = $_GET['file_url']; //get the path 
// or
$filePath = /path/to/file.ext

if(file_exists($filePath)) {
    $fileName = basename($filePath);
    $fileSize = filesize($filePath);

    // Output headers.
    header("Cache-Control: private");
    header("Content-Type: application/stream");
    header("Content-Length: ".$fileSize);
    header("Content-Disposition: attachment; filename=".$fileName);

    // Output file.
    readfile ($filePath);                   
    exit();
}
else {
    die('The provided file path is not valid.');
}

?>
