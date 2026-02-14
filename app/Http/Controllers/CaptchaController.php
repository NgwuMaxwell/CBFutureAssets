<?php
session_start(); // Ensure the session starts before storing CAPTCHA
use Illuminate\Support\Facades\Session;

header('Content-Type: image/png');

$captchaText = strtoupper(substr(md5(rand()), 0, 6)); // Generate random text
$_SESSION['_captcha'] = $captchaText; // Store in PHP session

// Laravel session

Session::put('_captcha', $captchaText);

// Generate the CAPTCHA image
$im = imagecreate(120, 40);
$bg = imagecolorallocate($im, 0, 0, 0); // Black background
$textColor = imagecolorallocate($im, 255, 255, 255); // White text
imagestring($im, 5, 35, 10, $captchaText, $textColor);
imagepng($im);
imagedestroy($im);
