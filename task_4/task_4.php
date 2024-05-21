<?php

function drawAngledRectangle($image, $x, $y, $width, $height, $angle, $color) {
    // Создаем временное изображение для прямоугольника
    $tempImage = imagecreatetruecolor($width, $height);
    $transparentColor = imagecolorallocatealpha($tempImage, 0, 0, 0, 127);
    imagefill($tempImage, 0, 0, $transparentColor);

    // Рисуем прямоугольник на временном изображении
    $rectColor = imagecolorallocate($tempImage, 255, 0, 0);
    imagefilledrectangle($tempImage, 0, 0, $width - 1, $height - 1, $color);

    // Поворачиваем временное изображение
    $rotatedImage = imagerotate($tempImage, $angle, $transparentColor);
    imagesavealpha($rotatedImage, true);

    // Копируем повернутое изображение на основное
    $rotatedWidth = imagesx($rotatedImage);
    $rotatedHeight = imagesy($rotatedImage);
    imagecopy($image, $rotatedImage, $x, $y, 0, 0, $rotatedWidth, $rotatedHeight);

    // Освобождаем память, занимаемую временными изображениями
    imagedestroy($tempImage);
    imagedestroy($rotatedImage);
}

$width = 800;
$height = 800;
$image = imagecreatetruecolor($width, $height);

// Allocate colors
$skyColor = imagecolorallocate($image, 135, 206, 235); // Sky blue
$grassColor = imagecolorallocate($image, 124, 252, 0); // Lawn green
$sunColor = imagecolorallocate($image, 255, 255, 0);   // Sun yellow
// $treeColor = imagecolorallocate($image, 139, 69, 19);  // Brown
$trunkColor = imagecolorallocate($image, 139, 69, 19); // Brown
// $leafColor = imagecolorallocate($image, 34, 139, 34);  // Forest green
// $flowerColor = imagecolorallocate($image, 255, 20, 147); // Deep pink

// Fill the background with sky blue
imagefilledrectangle($image, 0, 0, $width, $height, $skyColor);

// Draw the sun
imagefilledellipse($image, 700, 100, 120, 120, $sunColor);

// Draw the grass
imagefilledrectangle($image, 0, 500, $width, $height, $grassColor);

$values = array(
            40,  50,  // Point 1 (x, y)
            20,  240, // Point 2 (x, y)
            60,  60,  // Point 3 (x, y)
            240, 20,  // Point 4 (x, y)
            50,  40,  // Point 5 (x, y)
            10,  10   // Point 6 (x, y)
            );
// Allocate colors
$im = $image;
$white = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);
$yellow = imagecolorallocate($im, 255, 255, 0);

$green = $grassColor;
$x_coordinate_of_triangle = 600;
$offset_for_right_points = 200;
// Define the triangle's three points
$point1 = array($x_coordinate_of_triangle + $offset_for_right_points, 300); // Top point
$point2 = array($x_coordinate_of_triangle, 500); // Bottom left point
$point3 = array($x_coordinate_of_triangle + $offset_for_right_points, 500); // Bottom right point

// Sort points from top to bottom
$points = [$point1, $point2, $point3];
usort($points, function($a, $b) {
    return $a[1] - $b[1];
});

// Draw lines to fill the triangle
for ($y = $points[0][1]; $y <= $points[1][1]; ++$y) {
    $x1 = $points[0][0] + ($points[1][0] - $points[0][0]) * ($y - $points[0][1]) / max(($points[1][1] - $points[0][1]), 1);
    $x2 = $points[0][0] + ($points[2][0] - $points[0][0]) * ($y - $points[0][1]) / max(($points[2][1] - $points[0][1]), 1);
    if ($x1 > $x2) {
        list($x1, $x2) = [$x2, $x1];
    }
    imageline($im, (int)$x1, $y, (int)$x2, $y, $green);
}

for ($y = $points[1][1]; $y <= $points[2][1]; ++$y) {
    $x1 = $points[1][0] + ($points[2][0] - $points[1][0]) * ($y - $points[1][1]) / max(($points[2][1] - $points[1][1]), 1);
    $x2 = $points[0][0] + ($points[2][0] - $points[0][0]) * ($y - $points[0][1]) / max(($points[2][1] - $points[0][1]), 1);
    if ($x1 > $x2) {
        list($x1, $x2) = [$x2, $x1];
    }
    imageline($im, (int)$x1, $y, (int)$x2, $y, $green);
}

// Draw the triangle's outline
imageline($im, $points[0][0], $points[0][1], $points[1][0], $points[1][1], $black); // Top to bottom left
imageline($im, $points[1][0], $points[1][1], $points[2][0], $points[2][1], $black); // Bottom left to bottom right
imageline($im, $points[2][0], $points[2][1], $points[0][0], $points[0][1], $black); // Bottom right to top


// Output the image
header('Content-Type: image/png');
imagepng($image);

// Free up memory
imagedestroy($image);
?>
