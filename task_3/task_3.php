<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x_1 = filter_input(INPUT_POST, 'x_1', FILTER_VALIDATE_FLOAT);
    $y_1 = filter_input(INPUT_POST, 'y_1', FILTER_VALIDATE_FLOAT);
    $x_2 = filter_input(INPUT_POST, 'x_2', FILTER_VALIDATE_FLOAT);
    $y_2 = filter_input(INPUT_POST, 'y_2', FILTER_VALIDATE_FLOAT);
    $x_3 = filter_input(INPUT_POST, 'x_3', FILTER_VALIDATE_FLOAT);
    $y_3 = filter_input(INPUT_POST, 'y_3', FILTER_VALIDATE_FLOAT);
    $x_4 = filter_input(INPUT_POST, 'x_4', FILTER_VALIDATE_FLOAT);
    $y_4 = filter_input(INPUT_POST, 'y_4', FILTER_VALIDATE_FLOAT);
    if ($x_1 === false || $y_1 === false || 
        $x_2 === false || $y_2 === false || 
        $x_3 === false || $y_3 === false || 
        $x_4 === false || $y_4 === false) {
        echo "Please enter valid float numbers.";
    } else {
        $x_max_left_bottom = max($x_1, $x_3);
        $y_max_left_bottom = max($y_1, $y_3);
        $x_min_right_top   = min($x_2, $x_4);
        $y_min_right_top   = min($y_2, $y_4);
        $square_of_intersection = 0;
        if($x_max_left_bottom < $x_min_right_top && $y_max_left_bottom < $y_min_right_top) {
            $square_of_intersection = ($x_min_right_top - $x_max_left_bottom) * ($y_min_right_top - $y_max_left_bottom);
        }
        echo "Координаты первого прямоугольника:<br/>" . "left_bottom_x: $x_1".", left_bottom_y: $y_1".", right_top_x: $x_2".", right_top_y: $y_2"."<br/>";
        echo "Координаты второго прямоугольника:<br/>" . "left_bottom_x: $x_3".", left_bottom_y: $y_3".", right_top_x: $x_4".", right_top_y: $y_4"."<br/>";
        echo "Площадь пересечения:<br/>" . $square_of_intersection;
    }
} else {
    echo "Invalid request method.";
}
?>
