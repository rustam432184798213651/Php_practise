<?php

$width = 800;
$height = 800;
$image = imagecreatetruecolor($width, $height);

$skyColor = imagecolorallocate($image, 135, 206, 235); 
$grassColor = imagecolorallocate($image, 124, 252, 0); 
$sunColor = imagecolorallocate($image, 255, 255, 0);   
$trunkColor = imagecolorallocate($image, 139, 69, 19); 
$black = imagecolorallocate($image, 0, 0, 0);
$brown = imagecolorallocate($image, 150,75,0);
$green = imagecolorallocate($image, 0, 255, 0);
$white = imagecolorallocate($image, 255, 255, 255);
$gray = imagecolorallocate($image,  128, 128, 128);

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

function draw_rectangle($image, $point1, $point2, $point3, $color) {
    // Треугольник
    $black = imagecolorallocate($image, 0, 0, 0);

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
        imageline($image, (int)$x1, $y, (int)$x2, $y, $color);
    }

    for ($y = $points[1][1]; $y <= $points[2][1]; ++$y) {
        $x1 = $points[1][0] + ($points[2][0] - $points[1][0]) * ($y - $points[1][1]) / max(($points[2][1] - $points[1][1]), 1);
        $x2 = $points[0][0] + ($points[2][0] - $points[0][0]) * ($y - $points[0][1]) / max(($points[2][1] - $points[0][1]), 1);
        if ($x1 > $x2) {
            list($x1, $x2) = [$x2, $x1];
        }
        imageline($image, (int)$x1, $y, (int)$x2, $y, $color);
    }

    imageline($image, $points[0][0], $points[0][1], $points[1][0], $points[1][1], $black); 
    imageline($image, $points[1][0], $points[1][1], $points[2][0], $points[2][1], $black); 
    imageline($image, $points[2][0], $points[2][1], $points[0][0], $points[0][1], $black);
}



function insert_house($image, $positionX, $positionY, $scale, $angle,  $background_color)
{
    $originalImage = $image;

    // Load the object image (e.g., a rectangle)
    $objectImage = imagecreatefromjpeg('new_house.jpg');

    // Rotate the object image
    $rotatedObjectImage = imagerotate($objectImage, $angle, $background_color);

    // Get the dimensions of the rotated object image
    $objectWidth = (int)(imagesx($rotatedObjectImage) * $scale);
    $objectHeight = (int)(imagesy($rotatedObjectImage) * $scale);
    $rotatedObjectImage = imagescale($rotatedObjectImage, $objectWidth, $objectHeight);
    // Calculate the position to place the rotated object image on the original image

    // Overlay the rotated object image onto the original image
    imagecopymerge($originalImage, $rotatedObjectImage, $positionX, $positionY, 0, 0, $objectWidth, $objectHeight, 100);
}

$file = fopen("house_info.txt", "r");
while (!feof($file)) {
    $line = fgets($file);
    $parts = explode(" ", $line);
    
    if (count($parts) == 4) {
        $x = floatval($parts[0]);
        $y = floatval($parts[1]);
        $scale = floatval($parts[2]);
        $angle = floatval($parts[3]);
        insert_house($image, $x, $y, $scale, $angle, $skyColor);
    }
}

fclose($file);

// function draw_house($image, $x, $y, $color_of_body, $color_of_roof, $color_of_door, $scale)
// {
//     $width = 90;
//     $height = 80;
//     $y = $y - $height * $scale;
//     $point1_for_roof = array($x, $y);
//     $point2_for_roof = array($x + 90 * $scale, $y);
//     $point3_for_roof = array($x + 40 * $scale, $y - 50 * $scale);
//     imagefilledrectangle($image, $x, $y + $height * $scale, $x + $width * $scale, $y, $color_of_body);
//     imagefilledrectangle($image, $x + 40 * $scale, $y + 80 * $scale, $x + 70 * $scale, $y + 30 * $scale, $color_of_door);
//     draw_rectangle($image, $point1_for_roof, $point2_for_roof, $point3_for_roof, $color_of_roof);
//     imagejpeg($image, 'new_house.jpg');
// }

$x_coordinate_of_triangle = 600;
$offset_for_right_points = 200;
$point1 = array($x_coordinate_of_triangle + $offset_for_right_points, 300); 
$point2 = array($x_coordinate_of_triangle, 500); 
$point3 = array($x_coordinate_of_triangle + $offset_for_right_points, 500); 
draw_rectangle($image, $point1, $point2, $point3, $grassColor);
// imagefilledrectangle($image, 210, 500, 300, 420, $gray);
// imagefilledrectangle($image, 250, 500, 280, 450, $black);

header('Content-Type: image/png');
imagepng($image);

imagedestroy($image);
?>
