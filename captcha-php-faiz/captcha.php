<?php 
session_start();
header('Content-type:image/png ');
$_SESSION['Captcha'] = "";
$img = imagecreate(40,40);


//generate font dan simpan di session

$font = generateRandomString(4);
$_SESSION['Captcha']  = $font;

// create base image (background)
$imgN = imagecreatetruecolor(100,80);

// set background color
$bg = imagecolorallocate($imgN, 100, 0,0);

$coordY = [5, 30, 55];
$rotates = [0, 10, 20, 30];
for($i = 0; $i < strlen($font); $i++) {
    // get char from $font
    $char = substr( $font, $i, 1 );

    // create image for char
    $imgChar = imagecreate(20, 20);
    // set rotation and y location index
    $rIdx = array_rand($rotates);
    $yIdx = array_rand($coordY);

    // set char background to black
    $bgChar = imagecolorallocatealpha($imgChar, 0, 0,0, 255);
    // set text color to white
    $text_color = imagecolorallocate($imgChar, 255,255,255);

    // create image from char
    imagestring($imgChar, 5, 5, 0, $char,$text_color);
    // rotate the char image
    $imgChar = imagerotate($imgChar, $rotates[$rIdx], $bgChar);

    // merge the char image to base image according to its location
    imagecopymerge($imgN, $imgChar, 5 + ($i*20), $coordY[$yIdx], 0, 0, 25, 25, 100);
}

// function for generating random string
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

imagepng($imgN);
imagedestroy($imgN);

?>