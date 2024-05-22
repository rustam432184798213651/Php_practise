<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php
            # Имена людей и их рост. 
            $people["Max"] = 160;
            $people["Nikita"] = 175;
            $people["Vika"] = 180;
            $people["Richard"] = 150;
            $people["John"] = 167;
            $people["Stuart"] = 170;
            $people["Kate"] = 186;
            $people["Monica"] = 180;
            $people["Jack"] = 184;
            $people["Kevin"] = 178;
            $people["Steve"] = 166;
            $people["Larry"] = 190;
            $people["Michael"] = 195; 
            $people["Olivia"] = 172;
            $people["Emma"] = 170;
            $people["Sophia"] = 175;
            
            // Нахождение минимальной и максимальной длины строки среди всех ключей. 
            $maxLength = PHP_INT_MIN;
            $minLength = PHP_INT_MAX;
            foreach ($people as $name => $height) {
                $keyLength = strlen($name);
                if ($keyLength < $minLength) {
                    $minLength = $keyLength;
                }
                if ($keyLength > $maxLength) {
                    $maxLength = $keyLength;
                }
            }
            // Нахождение людей с наиболее коротким и наиболее длинным именем.
            $people_with_shortest_name = [];
            $people_with_longest_name = [];
            foreach($people as $name => $height) {
                if (strlen($name) == $maxLength) {
                    $people_with_longest_name[$name] = $height;
                }
                if (strlen($name) == $minLength) {
                    $people_with_shortest_name[$name] = $height;
                }
            }
            $style = "\"border: 1px solid black;border-collapse: collapse;\"";
            echo "Таблица всех людей";
            echo "<table style=".$style.">";
            echo "<tr><th>Name</th><th>Height</th></tr>";
            foreach($people as $name => $height) {
                echo "<tr>";
                echo "<td>" . $name . "</td>" . "<td>" . $height . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "Люди с наиболее коротким именем" . "<br/>";
            echo "<table style= ".$style.">";
            echo "<tr><th>Name</th><th>Height</th></tr>";
            foreach($people_with_shortest_name as $name => $height) {
                echo "<tr>";
                echo "<td>" . $name . "</td>" . "<td>" . $height . "</td>";
                echo "</tr>";
            }
            echo "</table>";

  
            echo "Люди с наиболее длинным именем" . "<br/>";
            echo "</table style=".$style.">";
            echo "<table>";
            echo "<tr><th>Name</th><th>Height</th></tr>";
            foreach($people_with_longest_name as $name => $height) {
                echo "<tr>";
                echo "<td>" . $name . "</td>" . "<td>" . $height . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>
