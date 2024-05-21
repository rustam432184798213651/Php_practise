<?php

function drawAngledRectangle($image, $x, $y, $width, $height, $angle, $color) {
    $tempImage = imagecreatetruecolor($width, $height);
    $transparentColor = imagecolorallocatealpha($tempImage, 0, 0, 0, 127);
    imagefill($tempImage, 0, 0, $transparentColor);

    $rectColor = imagecolorallocate($tempImage, 255, 0, 0);
    imagefilledrectangle($tempImage, 0, 0, $width - 1, $height - 1, $color);

    $rotatedImage = imagerotate($tempImage, $angle, $transparentColor);
    imagesavealpha($rotatedImage, true);

    $rotatedWidth = imagesx($rotatedImage);
    $rotatedHeight = imagesy($rotatedImage);
    imagecopy($image, $rotatedImage, $x, $y, 0, 0, $rotatedWidth, $rotatedHeight);

    imagedestroy($tempImage);
    imagedestroy($rotatedImage);
}

$width = 800;
$height = 800;
$image = imagecreatetruecolor($width, $height);

$skyColor = imagecolorallocate($image, 135, 206, 235); 
$grassColor = imagecolorallocate($image, 124, 252, 0); 
$sunColor = imagecolorallocate($image, 255, 255, 0);   
$trunkColor = imagecolorallocate($image, 139, 69, 19); 

imagefilledrectangle($image, 0, 0, $width, $height, $skyColor);
imagefilledellipse($image, 700, 100, 120, 120, $sunColor);
imagefilledrectangle($image, 0, 500, $width, $height, $grassColor);

$values = array(
            40,  50, 
            20,  240,
            60,  60, 
            240, 20, 
            50,  40, 
            10,  10  
            );

$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
$yellow = imagecolorallocate($image, 255, 255, 0);

$green = $grassColor;
$x_coordinate_of_triangle = 600;
$offset_for_right_points = 200;
$point1 = array($x_coordinate_of_triangle + $offset_for_right_points, 300); 
$point2 = array($x_coordinate_of_triangle, 500); 
$point3 = array($x_coordinate_of_triangle + $offset_for_right_points, 500); 

$points = [$point1, $point2, $point3];
usort($points, function($a, $b) {
    return $a[1] - $b[1];
});

for ($y = $points[0][1]; $y <= $points[1][1]; ++$y) {
    $x1 = $points[0][0] + ($points[1][0] - $points[0][0]) * ($y - $points[0][1]) / max(($points[1][1] - $points[0][1]), 1);
    $x2 = $points[0][0] + ($points[2][0] - $points[0][0]) * ($y - $points[0][1]) / max(($points[2][1] - $points[0][1]), 1);
    if ($x1 > $x2) {
        list($x1, $x2) = [$x2, $x1];
    }
    imageline($image, (int)$x1, $y, (int)$x2, $y, $green);
}

for ($y = $points[1][1]; $y <= $points[2][1]; ++$y) {
    $x1 = $points[1][0] + ($points[2][0] - $points[1][0]) * ($y - $points[1][1]) / max(($points[2][1] - $points[1][1]), 1);
    $x2 = $points[0][0] + ($points[2][0] - $points[0][0]) * ($y - $points[0][1]) / max(($points[2][1] - $points[0][1]), 1);
    if ($x1 > $x2) {
        list($x1, $x2) = [$x2, $x1];
    }
    imageline($image, (int)$x1, $y, (int)$x2, $y, $green);
}

imageline($image, $points[0][0], $points[0][1], $points[1][0], $points[1][1], $black); 
imageline($image, $points[1][0], $points[1][1], $points[2][0], $points[2][1], $black); 
imageline($image, $points[2][0], $points[2][1], $points[0][0], $points[0][1], $black); 

header('Content-Type: image/png');
imagepng($image);

imagedestroy($image);
?>
