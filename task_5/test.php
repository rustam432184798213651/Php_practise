<!DOCTYPE html>
<html>
    <body>
        <form>
        <label for="Age">
        
        <?php
            $city = "";
            $age  = "";
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $city = filter_input(INPUT_POST, 'City');
                $age  = filter_input(INPUT_POST, 'Age');
            }
            echo "<label for=\"Name\">Your name</label></br>";
            echo "<input type=\"text\" name=\"Name\"></br>";
            echo "<label for=\"City\"> Your city:</label></br>";
            echo "<input type=\"text\" name=\"City\" value=\"$city\"></br>";
            echo "<label for=\"Age\">Your age:</label></br>";
            echo "<input type=\"number\" step=\"1\" name=\"Age\" value=\"$age\">"; 
        ?>

        <?php

        ?>
    </body>
</html>
