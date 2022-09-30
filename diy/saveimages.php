<?php
$img = $_POST['sendfile'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$fileData = base64_decode($img);
$fileName = 'IMG-'.time().'.png';

file_put_contents($fileName, $fileData);
?>