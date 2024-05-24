<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
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
        <input type="radio" name="Color" value="red" checked>Red</br> 
        <input type="radio" name="Color" value="yellow">Yellow</br>
        <input type="submit" value="Choose" name="Result"> 
    </form >
    <br>
    <form class="UserInfoForm">
        <label for="City">Enter your city</label>
        <input type="text" name="City" required><br>
        <label for="Age">Enter your age</label>
        <input type="number" step="1" name="Age" required><br> 
        <input type="submit" value="Send" name="UserData">
    </form>
    </body>
</html>