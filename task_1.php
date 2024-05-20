<!DOCTYPE html>
<html>
    <body>
        <?php
        $json = file_get_contents('images/sizes.json');
        $planets_data = json_decode($json, true);
        //print_r($json_data["Jupiter"][0]);
        echo "<table>";
        $name_of_folder_with_images = "Images";
        $multiplyer = 1.0;
        foreach ($planets_data as $planet_name => $size) {
            $width = $size[0] * $multiplyer;
            $height = $size[1] * $multiplyer;
            echo "<tr>";
            echo "<td>" . $width . "x" . $height . "</td>";
            echo "<td>" . "<img src = " . $name_of_folder_with_images . "/" . $planet_name . ".png" .  " width= " . $width . " height = " . $height . ">" . "</td>";
            echo "</tr>";
            $multiplyer = $multiplyer * 1.2;
        }
        echo "</table>";
        ?>

    </body>
</html>