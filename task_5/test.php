<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/form_style.css">
    </head>
    <body>
        <div class="form-container">
            <h2>User information</h2>
            <form>
                <label for="Age">
                
                <?php
                    $city = "";
                    $age  = "";
                    if(isset($_COOKIE["city"])) {
                        $city = $_COOKIE["city"];
                    }
                    if(isset($_COOKIE["age"])) {
                        $age = $_COOKIE["age"];
                    }
                    echo "<label for=\"Name\">Your name</label></br>";
                    echo "<input type=\"text\" name=\"Name\"></br>";
                    echo "<label for=\"City\"> Your city:</label></br>";
                    echo "<input type=\"text\" name=\"City\" value=\"$city\"></br>";
                    echo "<label for=\"Age\">Your age:</label></br>";
                    echo "<input type=\"number\" step=\"1\" name=\"Age\" value=\"$age\">"; 
                ?>
                <button type="submit">Submit</button>
            </form>
        <div>
    </body>
</html>
