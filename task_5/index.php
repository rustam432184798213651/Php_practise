<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <?php
        $a = "";
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $choosen_color = filter_input(INPUT_POST, 'Color');
            $a = " style=\"background-color:$choosen_color\"";
        }
        echo "<body" . $a . ">";  
    ?>        
    <form method="post" action=".">
        <input type="radio" name="Color" value="red" checked>Red</br> <!--This one is automatically checked when the user opens the page-->
        <input type="radio" name="Color" value="yellow">Yellow</br>
        

        <input type="submit" value="Choose" name="Result"> <!--This button opens Result.php-->
    </form >
    </body>
</html>