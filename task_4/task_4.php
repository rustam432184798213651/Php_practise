<?php
// Создание изображения
$width = 400;
$height = 400;
$image = imagecreatetruecolor($width, $height);

// Установка цветов
$background_color = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
$yellow = imagecolorallocate($image, 255, 255, 0);

// Заливка фона
imagefilledrectangle($image, 0, 0, $width - 1, $height - 1, $background_color);

// Рисование лица
imageellipse($image, $width / 2, $height / 2, 300, 300, $black);

// Рисование глаз
imageellipse($image, $width / 2 - 75, $height / 2 - 50, 50, 50, $black);
imageellipse($image, $width / 2 + 75, $height / 2 - 50, 50, 50, $black);

// Рисование улыбки
imagearc($image, $width / 2, $height / 2 + 50, 200, 150, 0, 180, $black);

// Заливка фона внутри улыбки
imagefilltoborder($image, $width / 2, $height / 2 + 50, $black, $yellow);

// Вывод изображения
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>
