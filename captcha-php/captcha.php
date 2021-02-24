<?php 
session_start();
header('Content-type:image/png ');
$_SESSION['Captcha'] = "";
$img = imagecreate(70,40);

$bg = imagecolorallocate($img, 0, 0,0);
$text_color = imagecolorallocate($img,255,255,255);
$font = random_int(0, 999);
$_SESSION['Captcha']  = $font;
imagestring($img, 5, 7, 8, $font,$text_color);

imagepng($img);
imagedestroy($img);

?>